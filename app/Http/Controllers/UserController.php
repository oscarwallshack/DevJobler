<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use App\Models\User;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
     * Display a listing of the resource.
     * @param  User  $user
     *
     * @return View
     */
    public function show($id): View
    {
        $user = User::find($id);
        return view('profile', compact('user'));
    }

    // --------------- UPDATE EMPLOYEE ---------------

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateEmployeeRequest  $request
     * @param  User  $user
     * @param  Employee  $employee
     * @return RedirectResponse
     */
    public function updateEmployee(UpdateEmployeeRequest $request, User $id): RedirectResponse
    {
        $user = $id;
        $validated = $request->validated(); //pobieranie zwalidowanych danych
        $employee = $user->employee;
        $oldImagePatch = $user->employee->employee_image_src;
        $oldCvFile = $user->employee->employee_cv;


        $employee->fill($validated);
        if ($request->hasFile('employee_image_src')) {
            if (Storage::exists($oldImagePatch)) {
                Storage::delete($oldImagePatch);
            }
            $employee->employee_image_src = $request->file('employee_image_src')->store('employees');
        }
        if ($request->hasFile('employee_cv')) {
            if (Storage::exists($oldCvFile)) {
                Storage::delete($oldCvFile);
            }
            $employee->employee_cv = $request->file('employee_cv')->store('employees/CVs');
        }
        //aktualizacja tabeli user
        $user->name = $validated['employee_name'];
        $user->surname = $validated['employee_surname'];
        $user->email = $validated['employee_email'];


        $user->employee()->save($employee); //zapisanie danych w tabeli employee
        $user->save(); //zapisanie danych w tabeli user
        return redirect()->route('employees.index', $user)->with('status', 'Profil zaktualizowany!');
    }

    /**
     * Update the specified resource in storage.
     * @return RedirectResponse | StreamedResponse
     */
    public function downloadCv($id): RedirectResponse | StreamedResponse
    {
        $employee = Employee::find($id);
        if (Storage::exists($employee->employee_cv)) {
            return Storage::download($employee->employee_cv);
        }

        return Redirect::back();
    }

    // --------------- UPDATE COMPANY ---------------

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCompanyRequest  $request
     * @param  User  $user
     * @param  Company  $company
     * @return RedirectResponse
     */
    public function updateCompany(UpdateCompanyRequest $request, 
    User $id): RedirectResponse
    {
        $validated = $request->validated(); //pobieranie zwalidowanych danych
        $user = $id;

        //wypełnienie tabeli company
        $company = $user->company;
        $company->fill($validated);
        if ($request->hasFile('company_image_src')) {
            $company->company_image_src = $request
            ->file('company_image_src')->store('companies');
        }
        //aktualizacja tabeli user
        $user->name = $validated['employer_name'];
        $user->surname = $validated['employer_surname'];
        $user->email = $validated['employer_email'];

        $user->company()->save($company); //zapisanie danych w tabeli company
        $user->save(); //zapisanie danych w tabeli user
        return redirect()->route('companies.index', $user)
        ->with('status', 'Profil zaktualizowany!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        try {
            $user = User::find($user);
            $user->delete();
            return response()->json([
                'status' => 'success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
            ])->setStatusCode(500);
        }
    }
}
