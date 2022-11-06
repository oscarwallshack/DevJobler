@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="header header-home">
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-2 mx-auto text-center bg-image"
                style="background-image: url('public\storage\img\header_background.png');">
                <h1 class="display-5">Realizuj projekty i spełniaj się zawodowo z DevJobler</h1>
                <h2 class="lead">Przeglądaj profile specjalistów IT lub znajdź swoją przyszłą prace</h2>
            </div>
            <div class="row justify-content-center pb-md-5">
                <button type="button" class="btn-lg btn-primary m-5"><a href="/firmy-it">Firmy IT </a> </button>
                <button type="button" class="btn-lg btn-primary m-5"><a href="/specjalisci-it">Specjaliści IT </a>
                </button>
            </div>
        </section>
        <div class="job result-body">
            {{-- @if (!is_null($offers))
                <h3 class="row justify-content-center pb-md-5 ">Obecnie nie ma żadnych ofert do wyświetlenia</h3>
            @endif --}}
            @foreach ($offers as $offer)
                <div class="card card-body mt-3 ">
                    <div
                        class="media align-items-center align-items-lg-start d-flex justify-content-between text-lg-left flex-column flex-lg-row flex-sm-nowrap">
                        <div class="mr-2 mb-3 mb-lg-0 row justify-content-sm-center">
                            @if (!is_null($offer->offer_img_src))
                                <img src="https://www.bootdey.com/app/webroot/img/Content/user_1.jpg" width="65" height="65"
                                    alt="Zdjęcie ofertowe">
                            @else
                                <img class="d-sm-none d-lg-inline" src="{{ asset('storage/' . $offer->offer_image_src) }}" width="100" height="100" 
                                    alt="Zdjęcie ofertowe" />
                                    <img class="d-lg-none" src="{{ asset('storage/' . $offer->offer_image_src) }}" width="auto" height="150" />
                            @endif

                            <span class="column ml-2 text-lg-left text-sm-center text-md-left">
                                <h5><a href="{{ route('offers.offer', $offer->id) }}">{{ $offer->offer_name }}</a></h5>
                                <p class="m-0"><a href="{{ route('offers.offer', $offer->id) }}"><i
                                            class="far fa-building"></i>
                                        {{ $offer->offer_company }}</a> </p>

                                <div class="m-0 row text-lg-left justify-content-sm-center text-md-left">
                                    <span class="m-1 text-muted time">Dodano
                                        {{ $offer->created_at->format('d.m.Y') }}</span>

                                    <p class="m-1 type"><img class=" m-1"
                                            src="{{ asset('storage/icons/contract.png') }} " width="15" height="15"
                                            alt="contract">{{ $offer->offer_type }}</p>

                                    <p class="m-1">
                                        <span class="text-muted time"><img class=" m-1"
                                                src="{{ asset('storage/icons/req.png') }} " width="15" height="15"
                                                alt="contract">Rekrutacja
                                            {{ $offer->offer_recruitment_method }}</span>
                                    </p>
                                    <p class=" rounded-pill ml-3 p-1 text-muted bg-soft-danger"><i
                                            class="fas fa-map-marker-alt"></i><b> Praca
                                            {{ $offer->offer_working_place }}</b></p>
                                </div>
                            </span>
                        </div>

                        <span class="column">
                            <div class="mr-2 mt-3 row align-items-center">
                                <h3 class="font-weight-semibold text-success mr-4">
                                    {{ $offer->offer_salary_min . ' - ' . $offer->offer_salary_max }} PLN</h3>
                            </div>
                            <div class=" widget-26-job-category ">
                                @foreach (array_slice($array = explode(' ', $offer->offer_requirements), 0, 5) as $skill)
                                    <span class="rounded-pill bg-soft-info p-1">{{ $skill }}</span>

                                @endforeach
                            </div>
                        </span>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection
