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
            @foreach($workers as $worker)
            <tr>
                <th scope="row">{{$worker->id}}</th>
                <td>{{$worker->worker_name}}</td>
                <td>{{$worker->worker_surname}}</td>
                <td>{{$worker->worker_email}}</td>
                <td>{{$worker->worker_tel_num}}</td>
                <td>{{$worker->worker_adress}}</td>
                <td>{{$worker->worker_description}}</td>
                <td>{{$worker->worker_img_src}}</td>
                <td>{{$worker->work_status}}</td>
                <td>{{$worker->worker_education}}</td>

                <td>-</td>
            </tr>
            @endforeach
        <tbody>
    </table>
    {{ $workers->links()}}
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