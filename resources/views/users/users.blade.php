@extends('layouts.app')

@section('content')
<div class="container">
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
                <td>{{$user->email}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->user_role}}</td>
                <td>-</td>
            </tr>
            @endforeach
        <tbody>
    </table>
</div>
    {{-- <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">List group item heading</h5>
            <small>3 days ago</small>
          </div>
          <p class="mb-1">Some placeholder content in a paragraph.</p>
          <small>And some small print.</small>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">List group item heading</h5>
            <small class="text-muted">3 days ago</small>
          </div>
          <p class="mb-1">Some placeholder content in a paragraph.</p>
          <small class="text-muted">And some muted small print.</small>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">List group item heading</h5>
            <small class="text-muted">3 days ago</small>
          </div>
          <p class="mb-1">Some placeholder content in a paragraph.</p>
          <small class="text-muted">And some muted small print.</small>
        </a>
      </div>
    </div> --}}

@endsection
