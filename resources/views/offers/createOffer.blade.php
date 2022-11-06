@extends('layouts.app')
@php
$company = Auth::user()->company;
@endphp
@section('content')
    <div class="container">
        <section class="header header-itSpecialists">
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-5 mx-auto text-center bg-image">
                <h1 class="display-5">Nowa oferta pracy</h1>
                <h2 class="lead">Jaką dzisiaj oferujesz pracę? </h2>
            </div>
        </section>
        <div class="main-body">

            <!-- Breadcrumb -->
            {{-- <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav> --}}
            <!-- /Breadcrumb -->
            @if (!is_null($company->company_name) || !is_null($company->company_image_src) || !is_null($company->company_tel_num) || !is_null($company->company_address) || !is_null($company->company_website))

                <div class="col-12 justify-content-center m-5">
                    <button type="button" class="btn-lg btn-primary m-2"><a href="/profil-firmowy"><i
                                class="fas fa-chevron-left"></i> Wróć</a></button>
                </div>


                <form class="bg-white p-4 m-4" method="POST" action="{{ route('offers.store') }}"
                    enctype="multipart/form-data">
                    {{-- {{ method_field('PUT') }} --}}

                    @csrf
                    <input class="d-none" id="company_id" name="company_id" value="{{ $company->id }}">
                    <input class="d-none" id="offer_company" name="offer_company"
                        value="{{ $company->company_name }}">
                    @if (!is_null($company->company_image_src))
                        <input class="d-none" id="offer_image_src" name="offer_image_src"
                            value="{{ $company->company_image_src }}">
                        {{-- @else
                    <input class="d-none" id="offer_image_src" name="offer_image_src"
                    value="{{ 'storage/img/404.png' }}"> --}}
                    @endif
                    <input class="d-none" id="offer_email" name="offer_email"
                        value="{{ $company->employer_email }}">
                    <input class="d-none" id="offer_tel_num" name="offer_tel_num"
                        value="{{ $company->company_tel_num }}">
                    <input class="d-none" id="offer_company_address" name="offer_company_address"
                        value="{{ $company->company_address }}">
                    <input class="d-none" id="offer_company_website" name="offer_company_website"
                        value="{{ $company->company_website }}">

                    <div class="form-group row">
                        <label for="offer_name" class="col-md-4 col-form-label text-md-right">Stanowisko</label>

                        <div class="col-md-6">
                            <input id="offer_name" type="text"
                                class="form-control @error('offer_name') is-invalid @enderror" name="offer_name"
                                value="{{ old('offer_name') }}" required autocomplete="offer_name" autofocus>

                            @error('offer_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="offer_lvl" class="col-md-4 col-form-label text-md-right">Poziom stanowiska</label>

                        <div class="col-md-6">
                            <select name="offer_lvl" class="form-select form-select-sm w-100"
                                aria-label=".form-select-sm example" required>
                                <option value="Junior" selected>Junior</option>
                                <option value="Stażysta">Stażysta</option>
                                <option value="Middle">Middle</option>
                                <option value="Senior">Senior</option>
                            </select>

                            @error('offer_lvl')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="offer_type" class="col-md-4 col-form-label text-md-right">Typ umowy</label>

                        <div class="col-md-6">
                            <select name="offer_type" class="form-select form-select-sm w-100"
                                aria-label=".form-select-sm example" required>
                                <option value="Umowa o pracę" selected>Umowa o pracę</option>
                                <option value="Umowa o dzieło">Umowa o dzieło </option>
                                <option value="Umowa zlecenie">Umowa zlecenie </option>
                                <option value="Praktyki/staż">Praktyki/staż</option>
                                <option value="B2B">B2B</option>
                            </select>

                            @error('offer_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                    <label for="offer_contract_type" class="col-md-4 col-form-label text-md-right">Wymiar pracy</label>

                    <div class="col-md-6">
                        <input id="offer_contract_type" type="text"
                            class="form-control @error('offer_contract_type') is-invalid @enderror"
                            name="offer_contract_type" value="{{ old('offer_contract_type') }}"
                            autocomplete="offer_contract_type">

                        @error('offer_contract_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}

                    <div class="form-group row">
                        <label for="offer_salary_min" class="col-md-4 col-form-label text-md-right">Stawka miesięczna
                            minimalna</label>

                        <div class="col-md-6">
                            <input id="offer_salary_min" type="text"
                                class="form-control @error('offer_salary_min') is-invalid @enderror" name="offer_salary_min"
                                value="{{ old('offer_salary_min') }}" autocomplete="offer_salary_min" required>

                            @error('offer_salary_min')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="offer_salary_max" class="col-md-4 col-form-label text-md-right">Stawka miesięczna
                            maksymalna</label>

                        <div class="col-md-6">
                            <input id="offer_salary_max" type="text"
                                class="form-control @error('offer_salary_max') is-invalid @enderror" name="offer_salary_max"
                                value="{{ old('offer_salary_max') }}" autocomplete="offer_salary_max" required>

                            @error('offer_salary_max')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="offer_working_place" class="col-md-4 col-form-label text-md-right">Miejsce pracy</label>

                        <div class="col-md-6">
                            <select name="offer_working_place" class="form-select form-select-sm w-100"
                                aria-label=".form-select-sm example" required>
                                <option value="Zdalna" selected>Zdalna</option>
                                <option value="Stacjonarna">Stacjonarna</option>
                                <option value="Hybryda">Hybryda</option>
                            </select>



                            @error('offer_working_place')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="offer_recruitment_method" class="col-md-4 col-form-label text-md-right">Metoda
                            rekrutacji</label>

                        <div class="col-md-6">
                            <select name=" offer_recruitment_method" class="form-select form-select-sm w-100"
                                aria-label=".form-select-sm example @error('offer_recruitment_method') is-invalid @enderror">
                                <option value="Rozmowa online" selected>Rozmowa online </option>
                                <option value="Spotkanie">Spotkanie</option>
                            </select>

                            @error('offer_recruitment_method')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    {{-- <div class="form-group row">
                    <label for="offer_working_hours" class="col-md-4 col-form-label text-md-right">Godziny pracy</label>

                    <div class="col-md-6">
                        <input id="offer_working_hours" type="text"
                            class="form-control @error('offer_working_hours') is-invalid @enderror"
                            name="offer_working_hours" value="{{ old('offer_working_hours') }}"
                            autocomplete="offer_working_hours">

                        @error('offer_working_hours')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}

                    <div class="form-group row">
                        <label for="offer_requirements" class="col-md-4 col-form-label text-md-right">Wymagania</label>

                        <div class="col-md-6 row ">
                            {{-- <input type="hidden" name="offer_requirements[]" value=""> --}}

                            <div class="m-2 form-check">
                                <input class="form-check-input" id="option1" type="checkbox" name="offer_requirements[]"
                                    value="PHP" id="flexCheckChecked">
                                <label class="form-check-label" for="option1">
                                    PHP
                                </label>
                            </div>
                            <div class="m-2 form-check">
                                <input class="form-check-input" id="option2" type="checkbox" name="offer_requirements[]"
                                    value="HTML" id="flexCheckChecked">
                                <label class="form-check-label" for="option2">
                                    HTML
                                </label>
                            </div>
                            <div class="m-2 form-check">
                                <input class="form-check-input" id="option3" type="checkbox" name="offer_requirements[]"
                                    value="CSS" id="flexCheckChecked">
                                <label class="form-check-label" for="option3">
                                    CSS
                                </label>
                            </div>
                            <div class="m-2 form-check">
                                <input class="form-check-input" id="option4" type="checkbox" name="offer_requirements[]"
                                    value="Python" id="flexCheckChecked">
                                <label class="form-check-label" for="option4">
                                    Python
                                </label>
                            </div>
                            <div class="m-2 form-check">
                                <input class="form-check-input" id="option5" type="checkbox" name="offer_requirements[]"
                                    value=".NET" id="flexCheckChecked">
                                <label class="form-check-label" for="option5">
                                    .NET
                                </label>
                            </div>
                            <div class="m-2  form-check">
                                <input class="form-check-input" id="option6" type="checkbox" name="offer_requirements[]"
                                    value="JavaScript" id="flexCheckChecked">
                                <label class="form-check-label" for="option6">
                                    JavaScript
                                </label>
                            </div>
                            <div class="m-2 form-check">
                                <input class="form-check-input" id="option7" type="checkbox" name="offer_requirements[]"
                                    value="Java" id="flexCheckDefault">
                                <label class="form-check-label" for="option7">
                                    Java
                                </label>
                            </div>
                            <div class="m-2 form-check">
                                <input class="form-check-input" id="option8" type="checkbox" name="offer_requirements[]"
                                    value="TypeScript" id="flexCheckDefault">
                                <label class="form-check-label" for="option8">
                                    TypeScript
                                </label>
                            </div>
                            <div class="m-2 form-check">
                                <input class="form-check-input" id="option9" type="checkbox" name="offer_requirements[]"
                                    value="C++" id="flexCheckDefault">
                                <label class="form-check-label" for="option9">
                                    C++
                                </label>
                            </div>
                            <div class="m-2 form-check">
                                <input class="form-check-input" id="option10" type="checkbox" name="offer_requirements[]"
                                    value="C#" id="flexCheckDefault">
                                <label class="form-check-label" for="option10">
                                    C#
                                </label>
                            </div>
                            <div class="m-2 form-check">
                                <input class="form-check-input" id="option11" type="checkbox" name="offer_requirements[]"
                                    value="Swift" id="flexCheckDefault">
                                <label class="form-check-label" for="option11">
                                    Swift
                                </label>
                            </div>
                            <div class="m-2 form-check">
                                <input class="form-check-input" id="option12" type="checkbox" name="offer_requirements[]"
                                    value="Ruby" id="flexCheckDefault">
                                <label class="form-check-label" for="option12">
                                    Ruby
                                </label>
                            </div>
                            <div class="m-2 form-check">
                                <input class="form-check-input" id="option13" type="checkbox" name="offer_requirements[]"
                                    value="SQL" id="flexCheckDefault">
                                <label class="form-check-label" for="option13">
                                    SQL
                                </label>
                            </div>
                            <div class="m-2 form-check">
                                <input class="form-check-input" id="option14" type="checkbox" name="offer_requirements[]"
                                    value="Git" id="flexCheckDefault">
                                <label class="form-check-label" for="option14">
                                    Git
                                </label>
                            </div>
                        </div>

                        @error('offer_requirements[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="offer_tasks" class="col-md-4 col-form-label text-md-right">Zadania na stanowisk</label>

                        <div class="col-md-6">
                            <input id="offer_tasks" type="text"
                                class="form-control @error('offer_tasks') is-invalid @enderror" name="offer_tasks"
                                value="{{ old('offer_tasks') }}" autocomplete="offer_tasks">

                            @error('offer_tasks')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="offer_description" class="col-md-4 col-form-label text-md-right">Opis
                            stanowiska</label>

                        <div class="col-md-6">
                            <textarea id="offer_description" rows="6"
                                class="form-control @error('offer_description') is-invalid @enderror"
                                name="offer_description"
                                autocomplete="offer_description">{{ old('offer_description') }}</textarea>

                            @error('offer_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Dodaj</button>
                        </div>
                    </div>
                </form>
            @else
                <div class="justify-content-center text-center m-5">
                    <h3><a href="{{ route('companies.edit', Auth::user()->company) }}">Proszę uzupełnić profil aby dodać
                            ogłoszenie.</a></h3>
                </div>
            @endif
        </div>
    </div>
@endsection
