@extends('layouts.app')

@section('content')
<div class="container">
    <section class="header header-companies">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-5 mx-auto text-center">
        <h1 class="display-5">Profile pracodawców</h1> 
        <h2 class="lead">Dowiedz się więcej o swoim przyszłym pracodawcy</h2>
    </div>
    </section>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imie</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Email</th>
                <th scope="col">Rola</th>
                <th scope="col">Akcje</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->employee->employee_image_src}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->role}}</td>
                <td>-</td>
            </tr>
            @endforeach
        <tbody>
    </table>
    {{ $users->links()}}
</div>
@endsection
