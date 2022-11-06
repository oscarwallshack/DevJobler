@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="header header-companies">
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-5 mx-auto text-center bg-image">
                <h1 class="display-5">Firmy IT</h1>
                <h2 class="lead">Poznaj swoje wymarzone miejsce pracy!</h2>
            </div>
            <div class="row justify-content-center pb-md-5">
                <button type="button" class="btn-lg btn-primary m-5 px-3"><a href="/">Oferty pracy</a> </button>
                <button type="button" class="btn-lg btn-primary m-5 px-3"><a href="/specjalisci-it">Specjaliści IT</a> </button>
            </div>
        </section>
        {{-- @if (json_encode($companies->total()) == 0 )
        <h3 class="row justify-content-center pb-md-5 ">Obecnie nie ma żadnych specjalistów IT do wyświetlenia</h3>
        @endif  --}}
        <section
            class="company_profiles_card_container card-deck row justify-content-center justify-content-lg-center justify-content-md-start row-cols-1 row-cols-md-2 row-cols-xl-3">

            @foreach ($companies as $company)
                @if (!is_null($company->company_name))

                    <div class="company_profiles_container d-flex justify-content-center align-items-center my-3">
                        <div class="card">
                            @if (is_null($company->company_image_src))
                                <img class="profile-foto" src="{{ asset('storage/img/404.png') }} " alt="Zdjęcie firmowe"
                                    height="190" width="auto" />
                            @else
                                <img src="{{ asset('storage/' . $company->company_image_src) }}" alt="Zdjęcie firmowe"
                                    height="190" width="auto" />
                            @endif

                            <div class="mt-5 text-center">
                                <h4 class="mb-0">{{ $company->company_name }}</h4>
                                <span class="text-muted d-block mb-2">{{ $company->company_address }}</span>

                                <div class="mt-1 text-center">
                                    <h6 class="mx-2">Website</h6>
                                    <span>{{ 'www.' . strtolower($company->company_name) . '.pl' }}</span>
                                </div>

                                <button class="btn_profile1 btn-dark my-3"><a
                                        href="{{ route('companies.profile', $company->id) }}">Dowiedz się
                                        więcej</a></button>

                                @if (!is_null($company->company_offers))

                                    <div class="mt-3 text-center">
                                        <div class="mt-1 text-center">
                                            <h6 class="mx-2">Aktywnych ofert</h6>
                                            <span>{{ $company->company_offers }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                @endif
            @endforeach
            {{ $companies->links() }}

        </section>

    </div>
@endsection
