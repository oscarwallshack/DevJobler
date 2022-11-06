@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="header header-itSpecialists">
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-5 mx-auto text-center bg-image">
                <h1 class="display-5">Znajdź specjalistę IT</h1>
                <h2 class="lead">Zrealizuj swój projekt z pomocą doświadczonych programistów</h2>
            </div>
            <div class="row justify-content-center pb-md-5">
                <button type="button" class="btn-lg btn-primary m-5 px-3"><a href="/">Oferty pracy</a> </button>
                <button type="button" class="btn-lg btn-primary m-5 px-3"><a href="/firmy-it">Firmy IT</a> </button>
            </div>
        </section>
        <hr class="mb-5">

        {{-- @if (json_encode($employees->total()) == 0)
            <h3 class="row justify-content-center pb-md-5 ">Obecnie nie ma żadnych specjalistów IT do wyświetlenia</h3>
            @endif --}}
        <section
            class="profile_card_container card-deck row justify-content-center justify-content-lg-start justify-content-md-start row-cols-1 row-cols-md-2 row-cols-xl-3">

            @foreach ($employees as $employee)
                @if (!is_null($employee->employee_skills) && $employee->employee_skills[1] != '')
                    <div class="col-auto mb-5">
                        <div class="card card_profiles p-4 ">
                            <div class="profile_image d-flex flex-column justify-content-center align-items-center">
                                <button class="btn_profile text-center">
                                    @if (is_null($employee->employee_image_src))
                                        <img class="profile-foto"
                                            src="{{ asset('storage/img/avatars/male_avatar.jpg') }} "
                                            alt="Zdjęcie profilowe" height="160" width="150" />
                                    @else
                                        <img src="{{ asset('storage/' . $employee->employee_image_src) }}"
                                            alt="Zdjęcie profilowe" height="160" width="150" />
                                    @endif
                                </button>

                                <span
                                    class="profiles_name mt-3">{{ $employee->employee_name . ' ' . $employee->employee_surname }}</span>
                                {{-- <span class="idd"><i class="mx-2 fa fa-envelope"></i><a
                                        href="mailto:{{ $employee->employee_email }}">{{ $employee->employee_email }}</a></span>
                                @if (!is_null($employee->employee_tel_num))
                                    <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                                        <span><i class="mx-2 fa fa-phone"></i></span>
                                        <span class="idd1"><a
                                                href="tel:{{ $employee->employee_tel_num }}">{{ $employee->employee_tel_num }}</a></span>
                                    </div>
                                @endif --}}

                                @if (!is_null($employee->employee_address))

                                    <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                                        <span class="idd2"><i
                                                class="mx-2 fas fa-map-marked-alt"></i>{{ $employee->employee_address }}</span>
                                    </div>
                                @endif

                                <div class=" d-flex mt-2">
                                    <button class="btn_profile1 btn-dark"><a
                                            href="{{ route('employees.profile', $employee->id) }}">Dowiedz się
                                            więcej</a></button>
                                </div>

                                <div class="text justify-content-center align-items-center mt-3">
                                    <h5>{{ $employee->employee_status }}</h5> 
                                </div>
                                <div class="text justify-content-center align-items-center mt-3 technologies ">

                                    @if (!is_null($employee->employee_skills))

                                        @foreach (json_decode($employee->employee_skills) as $skill)
                                            <span class="badge technologies">{{ $skill }}</span>
                                        @endforeach
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            {{ $employees->links() }}

        </section>

    </div>
@endsection
