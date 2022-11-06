@extends('layouts.app')

@section('content')
<div class="container">
@include('helpers.flash-messages')
        <h1>Znajdujesz się w zakładce profil firmowy </h1>
    <div class="row justify-content-center">
        <button type="button" class="btn-lg btn-primary m-5"><a class="nav-link"  href="{{route('companies.edit', $company)}}"><i class="fa fa-user-edit">Edytuj profil</i></a></button>
        <button type="button" class="btn-lg btn-primary m-5"><a class="nav-link"  href="{{route('offers.create') }}"><i class="fa fa-user-edit">Nowa oferta</i></a></button>
        <button type="button" class="btn-lg btn-primary m-5"><a class="nav-link"  href="{{route('offers.index') }}"><i class="fa fa-user-edit">Twoje oferty</i></a></button>
    </div>
</div>

@endsection
