<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Carbon\Factory;
use Illuminate\Console\Application;
use Illuminate\Contracts\View\View;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function show(): View
    {
        return view('itSpecialists', [
            'employees' => Employee::paginate(10)
        ]);
    }
    /**
     * Display a listing of the resource.
     * @param  Employee  $employee
     *
     * @return View
     */
    public function profile($id): View
    {
        $employee = Employee::find($id);
        return view('profile', compact('employee'));
    }
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): Factory|View|Application
    {
        return view('employees.profil');
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function edit(): View
    {
        return view('employees.edit');
    }

    
}
