@extends('layouts.app')
@php
$user = Auth::user();
// $employee = Auth::user()->with('employees')->get()->toArray();;
@endphp
@section('content')
<div class="container">
    <h1>Znajdujesz się w zakładce edycji profilu pracownika </h1>
    <div class="row justify-content-center">
        <button type="button" class="btn-lg btn-primary m-5"><a class="nav-link"  href="">Profil</a></button>
    </div>
   
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edytuj swój profil {{$user->email}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        {{ method_field('PUT') }}
                        @csrf
                        {{-- <input style="display: none;" id='' value="{{$employee->user_role}}"> --}}
                        <div class="form-group row">
                            <label for="employee_name" class="col-md-4 col-form-label text-md-right">Imię</label>

                            <div class="col-md-6">
                                <input id="employee_name" type="text" class="form-control @error('employee_name') is-invalid @enderror" name="employee_name" value="{{ $user->name }}" required autocomplete="employee_name" autofocus>

                                @error('employee_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span >
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="employee_surname" class="col-md-4 col-form-label text-md-right">Nazwisko</label>

                            <div class="col-md-6">
                                <input id="employee_surname" type="text" class="form-control @error('employee_surname') is-invalid @enderror" name="employee_surname" value="{{$user->surname}}"  autocomplete="employee_surname" autofocus>

                                @error('employee_surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="employee_email" class="col-md-4 col-form-label text-md-right">Adres e-mail</label>

                            <div class="col-md-6">
                                <input id="employee_email" type="email" class="form-control @error('employee_email') is-invalid @enderror" name="employee_email" value="{{ $user->email}}" required autocomplete="employee_email">

                                @error('employee_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="employee_tel_num" class="col-md-4 col-form-label text-md-right">Numer telefonu</label>

                            <div class="col-md-6">
                                <input id="employee_tel_num" type="text" class="form-control @error('employee_tel_num') is-invalid @enderror" name="employee_tel_num" value="{{ $user->employee->employee_tel_num }}" autocomplete="employee_tel_num">

                                @error('employee_tel_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="employee_adress" class="col-md-4 col-form-label text-md-right">Miejsce zamieszkania</label>

                            <div class="col-md-6">
                                <input id="employee_adress" type="text" class="form-control @error('employee_adress') is-invalid @enderror" name="employee_adress" value="{{ $user->employee->employee_adress }}" required autocomplete="employee_adress">

                                @error('employee_adress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="employee_description" class="col-md-4 col-form-label text-md-right">Opis</label>

                            <div class="col-md-6">
                                <textarea id="employee_description" rows="6" class="form-control @error('employee_description') is-invalid @enderror" name="employee_description" autocomplete="employee_description">{{ $user->employee->employee_description }}</textarea>

                                @error('employee_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="employee_image_src" class="col-md-4 col-form-label text-md-right">Zdjęcie</label>

                            <div class="col-md-6">
                                <input id="employee_image_src" type="text" class="form-control @error('employee_image_src') is-invalid @enderror" name="employee_image_src" value="{{ $user->employee->employee_image_src }}" autocomplete="employee_image_src">

                                @error('employee_image_src')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="employee_status" class="col-md-4 col-form-label text-md-right">Obecne zatrudnienie</label>

                            <div class="col-md-6">
                                <input id="employee_status" type="text" class="form-control @error('employee_status') is-invalid @enderror" name="employee_status" value="{{ $user->employee->employee_status }}" required autocomplete="employee_status">

                                @error('employee_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="employee_education" class="col-md-4 col-form-label text-md-right">Wykształcenie</label>

                            <div class="col-md-6">
                                <input id="employee_education" type="text" class="form-control @error('employee_education') is-invalid @enderror" name="employee_education" value="{{ $user->employee->employee_education }}" required autocomplete="employee_education">

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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
