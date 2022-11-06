@extends('layouts.app')
@php
$user = Auth::user();
// $company = Auth::user()->with('companies')->get()->toArray();;
@endphp
@section('content')
    <div class="container">
        <section class="header header-itSpecialists">
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-5 mx-auto text-center bg-image">
                <h1 class="display-5">Znajdujesz się w zakładce edycji profilu firmowego </h1>
            </div>
        </section>

        <div class="row justify-content-center">
            <button type="button" class="btn-lg btn-primary m-5"><a class="nav-link"
                    href="{{ route('companies.index', Auth::user()->id) }}">Profil</a></button>

            <button type="button" class="btn-lg btn-primary m-5"><a class="nav-link"
                    href="{{ route('offers.create') }}"><i class="fa fa-user-edit">Nowa oferta</i></a></button>
            <button type="button" class="btn-lg btn-primary m-5"><a class="nav-link"
                    href="{{ route('offers.index') }}"><i class="fa fa-user-edit">Twoje oferty</i></a></button>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edytuj swój profil {{ $user->email }}</div>

                    <div class="row justify-content-center w-100 m-2">
                        @if (is_null($user->company->company_image_src))
                            <img class="profile-foto" src="{{ asset('storage/img/404.png') }} " alt="Zdjęcie profilowe"
                                height="200" width="345" />
                        @else
                            <img src="{{ asset('storage/' . $user->company->company_image_src) }}" alt="Zdjęcie profilowe"
                                height="200" width="345" />
                        @endif
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.updateCompany', ['id' => $user->id]) }}"
                            enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            @csrf

                            <input style="display:none" id='user_role' name='user_role' value="{{ $user->role }}">

                            <div class="form-group row">
                                <label for="company_image_src" class="col-md-4 col-form-label text-md-right">Zdjęcie</label>

                                <div class="col-md-6">
                                    <input id="company_image_src" type="file"
                                        class="form-control @error('company_image_src') is-invalid @enderror"
                                        name="company_image_src" value="{{ $user->company->company_image_src }}"
                                        autocomplete="company_image_src" required>

                                    @error('company_image_src')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="employer_name" class="col-md-4 col-form-label text-md-right">Imię</label>

                                <div class="col-md-6">
                                    <input id="employer_name" type="text"
                                        class="form-control @error('employer_name') is-invalid @enderror"
                                        name="employer_name" value="{{ $user->name }}" required
                                        autocomplete="employer_name" autofocus>

                                    @error('employer_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="employer_surname" class="col-md-4 col-form-label text-md-right">Nazwisko</label>

                                <div class="col-md-6">
                                    <input id="employer_surname" type="text"
                                        class="form-control @error('employer_surname') is-invalid @enderror"
                                        name="employer_surname" value="{{ $user->surname }}"
                                        autocomplete="employer_surname" autofocus>

                                    @error('employer_surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company_name" class="col-md-4 col-form-label text-md-right">Nazwa firmy</label>

                                <div class="col-md-6">
                                    <input id="company_name" type="text"
                                        class="form-control @error('company_name') is-invalid @enderror" name="company_name"
                                        value="{{ $user->company->company_name }}" autocomplete="company_name" autofocus>

                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="employer_email" class="col-md-4 col-form-label text-md-right">Adres
                                    e-mail</label>

                                <div class="col-md-6">
                                    <input id="employer_email" type="email"
                                        class="form-control @error('employer_email') is-invalid @enderror"
                                        name="employer_email" value="{{ $user->email }}" required
                                        autocomplete="employer_email">

                                    @error('employer_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="company_tel_num" class="col-md-4 col-form-label text-md-right">Numer
                                    telefonu</label>

                                <div class="col-md-6">
                                    <input id="company_tel_num" type="text"
                                        class="form-control @error('company_tel_num') is-invalid @enderror"
                                        name="company_tel_num" value="{{ $user->company->company_tel_num }}"
                                        autocomplete="company_tel_num">

                                    @error('company_tel_num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="company_address" class="col-md-4 col-form-label text-md-right">Adres
                                    firmy</label>

                                <div class="col-md-6">
                                    <input id="company_address" type="text"
                                        class="form-control @error('company_address') is-invalid @enderror"
                                        name="company_address" value="{{ $user->company->company_address }}"
                                        autocomplete="company_address">

                                    @error('company_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="company_nip" class="col-md-4 col-form-label text-md-right">Numer NIP
                                    firmy</label>

                                <div class="col-md-6">
                                    <input id="company_nip" type="text"
                                        class="form-control @error('company_nip') is-invalid @enderror" name="company_nip"
                                        value="{{ $user->company->company_nip }}" autocomplete="company_nip">

                                    @error('company_nip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="company_website" class="col-md-4 col-form-label text-md-right">Strona
                                    internetowa
                                    firmy</label>

                                <div class="col-md-6">
                                    <input id="company_website" type="text"
                                        class="form-control @error('company_website') is-invalid @enderror"
                                        name="company_website" value="{{ $user->company->company_website }}"
                                        autocomplete="company_website">

                                    @error('company_website')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="company_description" class="col-md-4 col-form-label text-md-right">Opis</label>

                                <div class="col-md-6">
                                    <textarea id="company_description" rows="6"
                                        class="form-control @error('company_description') is-invalid @enderror"
                                        name="company_description"
                                        autocomplete="company_description">{{ $user->company->company_description }}</textarea>

                                    @error('company_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-user-check"></i> Akceptuj
                                    </button>

                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="row mt-3 mr-2 float-right">
                            <button class="btn bg-soft-danger p-1 delete"data-id="{{ $user->id }}"">
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
        const deleteUrl = "{{ url('/profil-firmowy') }}/";
        const confirmDelete = "{{ __('Czy na pewno chcesz usunąć konto?') }}";
    @endsection
    @section('js-files')
        <script src="{{ asset('js/delete.js') }}"></script>
    @endsection
