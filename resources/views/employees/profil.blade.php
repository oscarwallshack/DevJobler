@extends('layouts.app')

@php
$user = Auth::user()
@endphp
@section('content')
<div class="container">
@include('helpers.flash-messages')
        <h1>Znajdujesz się w zakładce profil pracownika <b>{{$user->name}}</b></h1>
    <div class="row justify-content-center">
        <button type="button" class="btn-lg btn-primary m-5"><a class="nav-link"  href="{{route('employees.edit', Auth::user()->id)}}"><i class="fa fa-user-edit"></i> Edytuj profil</a></button>
    </div>
</div>

@endsection
