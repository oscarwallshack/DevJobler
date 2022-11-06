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
                <th scope="col">Numer telefonu</th>
                <th scope="col">Adres</th>
                <th scope="col">Opis</th>
                <th scope="col">Zdjęcie</th>
                <th scope="col">Obecny status</th>
                <th scope="col">Edukacja</th>
                <th scope="col">Akcja</th>

            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <th scope="row">{{$employee->id}}</th>
                <td>{{$employee->employee_name}}</td>
                <td>{{$employee->employee_surname}}</td>
                <td>{{$employee->employee_email}}</td>
                <td>{{$employee->employee_tel_num}}</td>
                <td>{{$employee->employee_address}}</td>
                <td>{{$employee->employee_description}}</td>
                <td>{{$employee->employee_img_src}}</td>
                <td>{{$employee->employee_status}}</td>
                <td>{{$employee->employee_education}}</td>

                <td>-</td>
            </tr>
            @endforeach
        <tbody>
    </table>
    {{ $employees->links()}}
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
