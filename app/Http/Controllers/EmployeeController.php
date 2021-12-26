<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Carbon\Factory;
use Illuminate\Console\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class EmployeeController extends Controller 

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function s()
    {
        //
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
    public function edit(User $user): View
    {
        return view('employees.edit',[
            'user' => $user
        ]);
    }
    

//   Tylko widoki 
}
