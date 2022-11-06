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

            <div class="row">
                <button type="button" class="btn-lg btn-primary mx-2 my-4 col-md-4"><a href="/"><i
                            class="fas fa-chevron-left">Wróć</i></a></button>
            </div>
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if (is_null($offer->offer_image_src))
                                    <img class="offer_image" src="{{ asset('storage/img/404.png') }} "
                                        alt="Zdjęcie profilowe" height="205" width="350" />
                                @else
                                    <img class="offer_image" src="{{ asset('storage/' . $offer->offer_image_src) }}"
                                        alt="Zdjęcie profilowe" height="205" width="350" />
                                @endif
                                <div class="mt-3">
                                    <h4>{{ $offer->offer_name }}</h4>
                                    <p class="text-secondary mb-1">{{ $offer->offer_company }}</p>
                                    <p class="text-muted font-size-sm">{{ $offer->offer_address }}</p>
                                    <a href="mailto:{{ $offer->offer_email }}"><button
                                            class="btn btn-outline-primary">Aplikuj</button></a>
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
                                <span class="text-secondary"><a
                                        href="$offer->offer_company">{{ 'https://' . strtolower($offer->offer_company) . '.com' }}</a></span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">

                                <h6 class="mb-0 ml-1"> <i class="ml-1 far fa-envelope"></i> Email</h6>
                                <span class="text-secondary"><a
                                        href="mailto:{{ $offer->offer_email }} ">{{ $offer->offer_email }}</a></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 ml-1"><i class="ml-1 fas fa-phone"></i> Tel</h6>
                                <span class="text-secondary"><a
                                        href="tel:{{ $offer->offer_tel_num }}">{{ strtolower($offer->offer_tel_num) }}</a></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 ml-1"><i class="ml-1 far fa-building"></i> Adres</h6>
                                <span class="text-secondary">{{ $offer->offer_company_address }}</span>
                            </li>


                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="mx-1 row d-flex align-items-center">

                                <i class="text-success fas fa-coins fa-4x mr-3"></i><span
                                    class="text-success h3 text-align-center">{{ $offer->offer_salary_min . ' - ' . $offer->offer_salary_max . 'PLN' }}</span>
                            </div>

                            <hr>
                                <div class="d-flex justify-content-between justify-content-sm-center flex-wrap">

                                    <div class="column m-1">
                                        <div class="col text-center">
                                            <h5 class="mb-0">Miejsce pracy</h5>
                                        </div>
                                        <div class="col text-secondary text-center">
                                            {{ $offer->offer_company_address }}
                                        </div>
                                    </div>

                                    <div class="column m-1">
                                        <div class="col text-center">
                                            <h5 class="mb-0">Poziom stanowiska</h5>
                                        </div>
                                        <div class="col text-secondary text-center">
                                            {{ $offer->offer_lvl }}
                                        </div>
                                    </div>

                                    <div class="column m-1">
                                        <div class="col text-center">
                                            <h5 class="mb-0">Praca</h5>
                                        </div>
                                        <div class="col text-secondary text-center">
                                            {{ $offer->offer_working_place }}
                                        </div>
                                    </div>

                                    <div class="column m-1">
                                        <div class="col text-center">
                                            <h5 class="mb-0">Umowa</h5>
                                        </div>
                                        <div class="col text-secondary text-center">
                                            {{ $offer->offer_type }}
                                        </div>
                                    </div>

                                    <div class="column m-1">
                                        <div class="col text-center">
                                            <h5 class="mb-0 text-center">Rekrutacja</h5>
                                        </div>
                                        <div class="col text-secondary text-center">
                                            {{ $offer->offer_recruitment_method }}
                                        </div>
                                    </div>
                                </div>
                            <hr>

                            <div class="ml-2 row">
                                <div class="row text-secondary d-flex justify-content-center">
                                    @foreach ($array = explode(' ', $offer->offer_requirements) as $skill)
                                        <span class="rounded-pill bg-soft-info p-2 m-2">{{ $skill }}</span>

                                    @endforeach
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5 class="mb-0">Zadania</h5>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $offer->offer_tasks }}
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row gutters-sm">
                        <div class="col mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="d-flex align-items-center mb-3">Opis</h5>
                                    <p> {{ $offer->offer_description }} </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
