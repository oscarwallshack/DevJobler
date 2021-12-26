@extends('layouts.app')

@php
$user = Auth::user()
@endphp
@section('content')
<div class="container">
    <h1>Znajdujesz się w zakładce profil pracownika <b>{{$user->name}}</b></h1>
    <div class="row justify-content-center">
        <button type="button" class="btn-lg btn-primary m-5"><a class="nav-link"  href="{{route('employees.edit', Auth::user()->id)}}">Edytuj profil</a></button>
    </div>
</div>

@endsection
