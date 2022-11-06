<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function show(): View
    {
        return view('listOfCompanies', [
            'companies' => Company::paginate(10)
        ]);
    }

    /**
    //  * @param  Company  $company
     * @return View
     */
    public function index(): View
    {
        // $company = Company::find($id);
        return view('companies.profil')->with('company', Auth::user());
    }

    /**
     * Display a listing of the resource.
     * @param  User  $user
     * @param  Company  $company
     * 
     * @return View
     */
    public function profile($id): View
    {
        $company = Company::find($id);
        return view('companyProfile', compact('company'));
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function edit(): View
    {
        return view('companies.edit');
    }
}
