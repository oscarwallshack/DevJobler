<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => User::paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return View
     */
    public function editEmployese(User $user): View
    {
        return view('employees.edit', [
            'user' => $user
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  User  $user
     * @param  Employee  $employee
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();
        
        $employee = $user->employee;
        $employee->fill($validated);
        $user->name = $validated['employee_name'];
        $user->surname = $validated['employee_surname'];
        $user->email = $validated['employee_email'];


        //$user->employee()->save(new Employee($validated));
        $user->employee()->save($employee);
        $user->save();
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
