@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Znajdujesz się w zakładce edycji profilu pracownika</h1>
    <div class="row justify-content-center">
        <button type="button" class="btn-lg btn-primary m-5"><a class="nav-link"  href="/profil-pracownika">Profil</a></button>
    </div>
   
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edytuj swój profil</div>

                <div class="card-body">
                    <form method="POST" action="{{route('it_workers.store')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="worker_name" class="col-md-4 col-form-label text-md-right">{{ __('Imię') }}</label>

                            <div class="col-md-6">
                                <input id="worker_name" type="text" class="form-control @error('worker_name') is-invalid @enderror" name="worker_name" value="{{ old('worker_name') }}" required autocomplete="worker_name" autofocus>

                                @error('worker_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="worker_surname" class="col-md-4 col-form-label text-md-right">{{ __('Nazwisko') }}</label>

                            <div class="col-md-6">
                                <input id="worker_surname" type="text" class="form-control @error('worker_surname') is-invalid @enderror" name="worker_surname" value="{{ old('worker_surname') }}"  autocomplete="worker_surname" autofocus>

                                @error('worker_surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="worker_email" class="col-md-4 col-form-label text-md-right">{{ __('Adres e-mail') }}</label>

                            <div class="col-md-6">
                                <input id="worker_email" type="email" class="form-control @error('worker_email') is-invalid @enderror" name="worker_email" value="{{ old('worker_email') }}" required autocomplete="worker_email">

                                @error('worker_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="worker_tel_num" class="col-md-4 col-form-label text-md-right">{{ __('Numer telefonu') }}</label>

                            <div class="col-md-6">
                                <input id="worker_tel_num" type="text" class="form-control @error('worker_tel_num') is-invalid @enderror" name="worker_tel_num" value="{{ old('worker_tel_num') }}" autocomplete="worker_tel_num">

                                @error('worker_tel_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="worker_adress" class="col-md-4 col-form-label text-md-right">{{ __('Miejsce zamieszkania') }}</label>

                            <div class="col-md-6">
                                <input id="worker_adress" type="text" class="form-control @error('worker_adress') is-invalid @enderror" name="worker_adress" value="{{ old('worker_adress') }}" required autocomplete="worker_adress">

                                @error('worker_adress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="worker_description" class="col-md-4 col-form-label text-md-right">{{ __('Opis') }}</label>

                            <div class="col-md-6">
                                <textarea id="worker_description" rows="6" class="form-control @error('worker_description') is-invalid @enderror" name="worker_description" autocomplete="worker_description">{{ old('worker_description') }}</textarea>

                                @error('worker_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="worker_img_src" class="col-md-4 col-form-label text-md-right">{{ __('Prześlij zdjęcie') }}</label>

                            <div class="col-md-6">
                                <input id="worker_img_src" type="text" class="form-control @error('worker_img_src') is-invalid @enderror" name="worker_img_src" value="{{ old('worker_img_src') }}" autocomplete="worker_img_src">

                                @error('worker_img_src')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="work_status" class="col-md-4 col-form-label text-md-right">{{ __('Obecne zatrudnienie') }}</label>

                            <div class="col-md-6">
                                <input id="work_status" type="text" class="form-control @error('work_status') is-invalid @enderror" name="work_status" value="{{ old('work_status') }}" required autocomplete="work_status">

                                @error('work_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="worker_education" class="col-md-4 col-form-label text-md-right">{{ __('Wykształcenie') }}</label>

                            <div class="col-md-6">
                                <input id="worker_education" type="text" class="form-control @error('worker_education') is-invalid @enderror" name="worker_education" value="{{ old('worker_education') }}" required autocomplete="worker_education">

                                @error('worker_education')
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


