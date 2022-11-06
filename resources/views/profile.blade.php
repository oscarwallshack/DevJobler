@extends('layouts.app')

@section('content')
    <div class="container">
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

            <div class="col-12 justify-content-center">

            </div>
            <div class="row">
                <button type="button" class="btn-lg btn-primary mx-2 my-4 col-md-4"><a href="/specjalisci-it"><i
                            class="fas fa-chevron-left"></i> Wróć</a></button>
                <div>
                    <h1 class="col offset-md-4 text-secondary text-center my-4">
                        @if (!is_null($employee->employee_status))
                            {{ $employee->employee_status . ' ' }}
                        @endif
                        {{ $employee->employee_name . ' ' . $employee->employee_surname }}
                    </h1>

                </div>

            </div>
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if (is_null($employee->employee_image_src))
                                    <img class="profile-foto" src="{{ asset('storage/img/avatars/male_avatar.jpg') }} "
                                        alt="Zdjęcie profilowe" height="160" width="150" />
                                @else
                                    <img src="{{ asset('storage/' . $employee->employee_image_src) }}"
                                        alt="Zdjęcie profilowe" height="160" width="150" class="rounded-circle" />
                                @endif
                                <div class="mt-3">
                                    <h4>{{ $employee->employee_name }}</h4>
                                    <a href="mailto:{{ $employee->employee_email }}"><button
                                            class="btn btn-outline-primary">Nawiąż kontakt</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-globe mr-2 icon-inline">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path
                                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                        </path>
                                    </svg>Strona internetowa</h6>
                                <span
                                    class="text-secondary">https://{{ strtolower(substr($employee->employee_name, 0, 1) . '.' . $employee->employee_surname) }}.com</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-github mr-2 icon-inline">
                                        <path
                                            d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                        </path>
                                    </svg>Github</h6>
                                <span
                                    class="text-secondary">github.com/{{ strtolower(substr($employee->employee_name, 0, 1) . '.' . $employee->employee_surname) }}</span>
                            </li>


                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-facebook mr-2 icon-inline text-primary">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                        </path>
                                    </svg>Facebook</h6>
                                <span
                                    class="text-secondary">facebook.com/{{ strtolower($employee->employee_name . '.' . $employee->employee_surname) }}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <div class="card card-body">
                                    <h6 class="d-flex align-items-center mb-3">Pobierz CV</h6>
                                    <a href="{{ route('employees.downloadCv', $employee) }}">
                                        <div class="text-center p-1"><i class="fas fa-5x fa-file-word"></i></div>
                                    </a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Pełne imię</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $employee->employee_name . ' ' . $employee->employee_surname }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $employee->employee_email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Telefon</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $employee->employee_tel_num }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Adres</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $employee->employee_address }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Technologie</h6>
                                </div>
                                <div class="text-secondary">
                                    <div class="ml-2 mt-2 row">
                                        @if (!is_null($employee->employee_skills))

                                            @foreach (json_decode($employee->employee_skills) as $skill)
                                                <span class="card px-2 mx-1"> {{ $skill }} </span>

                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row gutters-sm">
                        <div class="col mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3">Opis</h6>
                                    <p> {{ $employee->employee_description }} </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
