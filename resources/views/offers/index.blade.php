@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <section class="header header-itSpecialists">
                <div class="pricing-header px-3 py-3 pt-md-5 pb-md-5 mx-auto text-center bg-image">
                    <h1 class="display-5">Twoje oferty</h1>
                </div>
                <div class="row justify-content-center">
                    <button type="button" class="btn-lg btn-primary m-5"><a class="nav-link"
                            href="{{ route('companies.edit', Auth::user()->company) }}"><i class="fa fa-user-edit">Edytuj
                                profil</i></a></button>
                    <button type="button" class="btn-lg btn-primary m-5"><a class="nav-link"
                            href="{{ route('offers.create') }}"><i class="fa fa-user-edit">Nowa oferta</i></a></button>
                    <button type="button" class="btn-lg btn-primary m-5"><a class="nav-link"
                            href="{{ route('companies.index') }}"><i class="fa fa-user-edit">Profil</i></a></button>
                </div>
            </section>

            {{-- $offers->company_id == Auth::user()->company->id --}}
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nazwa</th>
                        <th scope="col">Data utworzenia</th>
                        <th scope="col">Akcja</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($offers as $offer)
                        @if ($offer->company_id == Auth::user()->company->id)
                            
                        <tr>
                            <th scope="row">{{ $offer->id }}</th>
                            <td>{{ $offer->offer_name }}</td>
                            <td>{{ $offer->created_at }}</td>
                            <td>
                                <a href="{{ route('offers.edit', $offer->id) }}">
                                    <button class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                </a>
                                {{-- <a href="{{ route('offers.destroy', $offer->id) }}"> --}}
                                <button class="btn btn-danger btn-sm delete" data-id="{{ $offer->id }}"><i class="far fa-trash-alt"></i></button>
                                {{-- </a> --}}
                            </td>
                        </tr>
                        @endif

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
    
@section('javascript')
    const deleteUrl = "{{ url('/profil-firmowy/aktualne-oferty/') }}/";
    const confirmDelete = "{{ __('Czy na pewno usunąć tę ofertę?') }}";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
