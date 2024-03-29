<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use App\Models\Employee;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'alpha', 'max:255'],
            'surname' => ['required', 'alpha', 'max:255'],
            'user_role' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     * @return \App\Models\Employee
     * @return \App\Models\Company
     * 
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'role' => $data['user_role'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if ($data['user_role'] === UserRole::EMPLOYEE){
            Employee::create([
                'employee_name' => $data['name'],
                'employee_surname' => $data['surname'],
                'employee_email' => $data['email'],
                'user_id' => $user->id,
            ]);
        }elseif($data['user_role'] === UserRole::COMPANY){
            Company::create([
                'employer_name' => $data['name'],
                'employer_surname' => $data['surname'],
                'employer_email' => $data['email'],
                'user_id' => $user->id,
            ]);
        }
        return $user;
    }
}
//$user->employee()->create($data);