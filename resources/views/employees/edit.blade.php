@extends('layouts.app')
@php
$user = Auth::user();
// $employee = Auth::user()->with('employees')->get()->toArray();;
@endphp
@section('content')
    <div class="container">
        <section class="header header-itSpecialists">
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-5 mx-auto text-center bg-image">
                <h1 class="display-5">Znajdujesz się w zakładce edycji profilu pracownika </h1>
                <h2 class="lead">Uzupełnij swój profil aby mógł wyświetlić się na karcie specjalistów</h2>
            </div>
        </section>


        <div class="row justify-content-center">
            <button type="button" class="btn-lg btn-primary m-5"><a class="nav-link"
                    href="{{ route('employees.index', $user->id) }}"><i class="far fa-user-circle"></i> Profil</a></button>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edytuj swój profil {{ $user->email }}</div>

                    <div class="row justify-content-center profile_image">
                        @if (is_null($user->employee->employee_image_src))
                            <img class="profile-foto" src="{{ asset('storage/img/avatars/male_avatar.jpg') }} "
                                alt="Zdjęcie profilowe" height="160" width="150" />
                        @else
                            <img src="{{ asset('storage/' . $user->employee->employee_image_src) }}"
                                alt="Zdjęcie profilowe" height="160" width="150" />
                        @endif
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.updateEmployee', ['id' => $user]) }}"
                            enctype="multipart/form-data">

                            {{ method_field('PUT') }}
                            @csrf
                            <div class="form-group row">
                                <label for="employee_image_src"
                                    class="col-md-4 col-form-label text-md-right">Zdjęcie</label>

                                <div class="col-md-6">
                                    <input id="employee_image_src" type="file"
                                        class="form-control @error('employee_image_src') is-invalid @enderror"
                                        name="employee_image_src" value="{{ $user->employee->employee_image_src }}"
                                        autocomplete="employee_image_src">

                                    @error('employee_image_src')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="employee_name" class="col-md-4 col-form-label text-md-right">Imię</label>

                                <div class="col-md-6">
                                    <input id="employee_name" type="text"
                                        class="form-control @error('employee_name') is-invalid @enderror"
                                        name="employee_name" value="{{ $user->name }}" required
                                        autocomplete="employee_name" autofocus>

                                    @error('employee_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="employee_surname" class="col-md-4 col-form-label text-md-right">Nazwisko</label>

                                <div class="col-md-6">
                                    <input id="employee_surname" type="text"
                                        class="form-control @error('employee_surname') is-invalid @enderror"
                                        name="employee_surname" value="{{ $user->surname }}"
                                        autocomplete="employee_surname" autofocus>

                                    @error('employee_surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="employee_email" class="col-md-4 col-form-label text-md-right">Adres
                                    e-mail</label>

                                <div class="col-md-6">
                                    <input id="employee_email" type="email"
                                        class="form-control @error('employee_email') is-invalid @enderror"
                                        name="employee_email" value="{{ $user->email }}" required
                                        autocomplete="employee_email">

                                    @error('employee_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="employee_tel_num" class="col-md-4 col-form-label text-md-right">Numer
                                    telefonu</label>

                                <div class="col-md-6">
                                    <input id="employee_tel_num" type="text"
                                        class="form-control @error('employee_tel_num') is-invalid @enderror"
                                        name="employee_tel_num" value="{{ $user->employee->employee_tel_num }}"
                                        autocomplete="employee_tel_num">

                                    @error('employee_tel_num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="employee_address" class="col-md-4 col-form-label text-md-right">Miejsce
                                    zamieszkania</label>

                                <div class="col-md-6">
                                    <input id="employee_address" type="text"
                                        class="form-control @error('employee_address') is-invalid @enderror"
                                        name="employee_address" value="{{ $user->employee->employee_address }}"
                                        autocomplete="employee_address">

                                    @error('employee_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="employee_description" class="col-md-4 col-form-label text-md-right">Opis</label>

                                <div class="col-md-6">
                                    <textarea id="employee_description" rows="6"
                                        class="form-control @error('employee_description') is-invalid @enderror"
                                        name="employee_description"
                                        autocomplete="employee_description">{{ $user->employee->employee_description }}</textarea>

                                    @error('employee_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="employee_cv" class="col-md-4 col-form-label text-md-right">CV</label>

                                <div class="col-md-6">
                                    <input id="employee_cv" type="file"
                                        class="form-control @error('employee_cv') is-invalid @enderror" name="employee_cv"
                                        value="{{ $user->employee->employee_cv }}" autocomplete="employee_cv">

                                    @error('employee_cv')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="employee_skills"
                                    class="col-md-4 col-form-label text-md-right">Technologie</label>

                                <div class="col-md-6 row ">
                                    {{-- <input type="hidden" name="employee_skills[]" value=""> --}}

                                    <div class="m-2 form-check">
                                        <input class="form-check-input" id="option1" type="checkbox"
                                            name="employee_skills[]" value="PHP" id="flexCheckChecked" @if (!is_null(json_decode($user->employee->employee_skills)))
                                        {{ in_array('PHP', json_decode($user->employee->employee_skills)) ? ' checked' : '' }}
                                        @endif
                                        >
                                        <label class="form-check-label" for="option1">
                                            PHP
                                        </label>
                                    </div>
                                    <div class="m-2 form-check">
                                        <input class="form-check-input" id="option2" type="checkbox"
                                            name="employee_skills[]" value="HTML" id="flexCheckChecked" @if (!is_null(json_decode($user->employee->employee_skills)))
                                        {{ in_array('HTML', json_decode($user->employee->employee_skills)) ? ' checked' : '' }}
                                        @endif>
                                        <label class="form-check-label" for="option2">
                                            HTML
                                        </label>
                                    </div>
                                    <div class="m-2 form-check">
                                        <input class="form-check-input" id="option3" type="checkbox"
                                            name="employee_skills[]" value="CSS" id="flexCheckChecked" @if (!is_null(json_decode($user->employee->employee_skills)))
                                        {{ in_array('CSS', json_decode($user->employee->employee_skills)) ? ' checked' : '' }}
                                        @endif>
                                        <label class="form-check-label" for="option3">
                                            CSS
                                        </label>
                                    </div>
                                    <div class="m-2 form-check">
                                        <input class="form-check-input" id="option4" type="checkbox"
                                            name="employee_skills[]" value="Python" id="flexCheckChecked" @if (!is_null(json_decode($user->employee->employee_skills)))
                                        {{ in_array('Python', json_decode($user->employee->employee_skills)) ? ' checked' : '' }}
                                        @endif>
                                        <label class="form-check-label" for="option4">
                                            Python
                                        </label>
                                    </div>
                                    <div class="m-2 form-check">
                                        <input class="form-check-input" id="option5" type="checkbox"
                                            name="employee_skills[]" value=".NET" id="flexCheckChecked" @if (!is_null(json_decode($user->employee->employee_skills)))
                                        {{ in_array('.NET', json_decode($user->employee->employee_skills)) ? ' checked' : '' }}
                                        @endif>
                                        <label class="form-check-label" for="option5">
                                            .NET
                                        </label>
                                    </div>
                                    <div class="m-2  form-check">
                                        <input class="form-check-input" id="option6" type="checkbox"
                                            name="employee_skills[]" value="JavaScript" id="flexCheckChecked" @if (!is_null(json_decode($user->employee->employee_skills)))
                                        {{ in_array('JavaScript', json_decode($user->employee->employee_skills)) ? ' checked' : '' }}
                                        @endif>
                                        <label class="form-check-label" for="option6">
                                            JavaScript
                                        </label>
                                    </div>
                                    <div class="m-2 form-check">
                                        <input class="form-check-input" id="option7" type="checkbox"
                                            name="employee_skills[]" value="Java" id="flexCheckDefault" @if (!is_null(json_decode($user->employee->employee_skills)))
                                        {{ in_array('Java', json_decode($user->employee->employee_skills)) ? ' checked' : '' }}
                                        @endif>
                                        <label class="form-check-label" for="option7">
                                            Java
                                        </label>
                                    </div>
                                    <div class="m-2 form-check">
                                        <input class="form-check-input" id="option8" type="checkbox"
                                            name="employee_skills[]" value="C" id="flexCheckDefault" @if (!is_null(json_decode($user->employee->employee_skills)))
                                        {{ in_array('C', json_decode($user->employee->employee_skills)) ? ' checked' : '' }}
                                        @endif>
                                        <label class="form-check-label" for="option8">
                                            C
                                        </label>
                                    </div>
                                    <div class="m-2 form-check">

                                        <input class="form-check-input" id="option9" type="checkbox"
                                            name="employee_skills[]" value="C++" id="flexCheckDefault" @if (!is_null(json_decode($user->employee->employee_skills)))
                                        {{ in_array('C++', json_decode($user->employee->employee_skills)) ? ' checked' : '' }}
                                        @endif>
                                        <label class="form-check-label" for="option9">

                                            C++
                                        </label>
                                    </div>
                                    <div class="m-2 form-check">
                                        <input class="form-check-input" id="option10" type="checkbox"
                                            name="employee_skills[]" value="C#" id="flexCheckDefault" @if (!is_null(json_decode($user->employee->employee_skills)))
                                        {{ in_array('C#', json_decode($user->employee->employee_skills)) ? ' checked' : '' }}
                                        @endif>
                                        <label class="form-check-label" for="option10">
                                            C#
                                        </label>
                                    </div>
                                    <div class="m-2 form-check">
                                        <input class="form-check-input" id="option11" type="checkbox"
                                            name="employee_skills[]" value="Swift" id="flexCheckDefault" @if (!is_null(json_decode($user->employee->employee_skills)))
                                        {{ in_array('Swift', json_decode($user->employee->employee_skills)) ? ' checked' : '' }}
                                        @endif>
                                        <label class="form-check-label" for="option11">
                                            Swift
                                        </label>
                                    </div>
                                    <div class="m-2 form-check">
                                        <input class="form-check-input" id="option12" type="checkbox"
                                            name="employee_skills[]" value="Ruby" id="flexCheckDefault" @if (!is_null(json_decode($user->employee->employee_skills)))
                                        {{ in_array('Ruby', json_decode($user->employee->employee_skills)) ? ' checked' : '' }}
                                        @endif>
                                        <label class="form-check-label" for="option12">
                                            Ruby
                                        </label>
                                    </div>
                                    <div class="m-2 form-check">
                                        <input class="form-check-input" id="option13" type="checkbox"
                                            name="employee_skills[]" value="SQL" id="flexCheckDefault" @if (!is_null(json_decode($user->employee->employee_skills)))
                                        {{ in_array('SQL', json_decode($user->employee->employee_skills)) ? ' checked' : '' }}
                                        @endif>
                                        <label class="form-check-label" for="option13">
                                            SQL
                                        </label>
                                    </div>
                                    <div class="m-2 form-check">
                                        <input class="form-check-input" id="option14" type="checkbox"
                                            name="employee_skills[]" value="Git" id="flexCheckDefault" @if (!is_null(json_decode($user->employee->employee_skills)))
                                        {{ in_array('Git', json_decode($user->employee->employee_skills)) ? ' checked' : '' }}
                                        @endif>
                                        <label class="form-check-label" for="option14">
                                            Git
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="employee_status"
                                    class="col-md-4 col-form-label text-md-right">Stanowisko</label>

                                <div class="col-md-6">
                                    <input id="employee_status" type="text"
                                        class="form-control @error('employee_status') is-invalid @enderror"
                                        name="employee_status" value="{{ $user->employee->employee_status }}"
                                        autocomplete="employee_status">

                                    @error('employee_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="employee_education"
                                    class="col-md-4 col-form-label text-md-right">Wykształcenie</label>

                                <div class="col-md-6">
                                    <input id="employee_education" type="text"
                                        class="form-control @error('employee_education') is-invalid @enderror"
                                        name="employee_education" value="{{ $user->employee->employee_education }}"
                                        autocomplete="employee_education">

                                    @error('employee_education')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Akceptuj') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="row mt-3 mr-2 float-right">
                            <button class="btn bg-soft-danger p-1 delete" data-id="{{ $user->id }}">
                                <i class="far fa-trash-alt"></i> Usuń konto
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    const deleteUrl = "{{ url('/profil') }}/";
    const confirmDelete = "{{ __('Czy na pewno chcesz usunąć konto?') }}";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
