@extends('layouts.app')

@section('title')
    HanaTour
@endsection

@section('content')
    <!-- Header -->
    <header class="text-center">
        <h1>
            explore the world safely and <br> make great memories with us.
        </h1>
        <p class="mt-3">
            You will see beautiful <br>
            moment you never see before
        </p>
        <a href="#popular" class="btn btn-get-started px-4 mt-4">
            Get Started
        </a>
    </header>
    <!-- Akhir Header -->

    <main>
        <!-- Info -->
        <div class="container col-lg-6 section-stats text-center" id="popular">
            <div class="row justify-content-center">
                <div class="col-lg-10 mt-4">
                    <div class="row">
                        <div class="col-lg">
                            <h2>
                                20K
                            </h2>
                            <p>
                                Members
                            </p>
                        </div>
                        <div class="col-lg">
                            <h2>
                                12
                            </h2>
                            <p>
                                Countries
                            </p>
                        </div>
                        <div class="col-lg">
                            <h2>
                                3K
                            </h2>
                            <p>
                                Hotels
                            </p>
                        </div>
                        <div class="col-lg">
                            <h2>
                                17
                            </h2>
                            <p>
                                Partner
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Info -->

        <!-- Awal Wisata Popular -->
        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>Wisata Popular</h2>
                        <p>Something that you never try <br> before in the world</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-popular-content" id="popularcontent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    @foreach ($items as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-travel text-center d-flex flex-column"
                                style="background-image: url('{{ $item -> galleries->count() ? Storage::url($item->galleries->first()->image): '' }}');">
                                <div class="travel-country">{{ $item->location }}</div>
                                <div class="travel-location">{{ $item->title }}</div>
                                <div class="travel-button mt-auto">
                                    <a href="{{ route('details', $item->slug)}}" class="btn btn-travel-details px-4">See Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Akhir Wisata Popular -->

        <!-- Awal Partner -->
        <section class="section-patners" id="networks">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <h2>
                            Patners
                        </h2>
                        <p>
                            Companies are trusted us <br>
                            more than just a trip
                        </p>
                    </div>
                    <div class="col-lg-8 logo-patner text-center">
                        <img src="frontend/images/logo/logo patner.png" alt="Logo Patners" width="750px">
                    </div>
                </div>
            </div>
        </section>
        <!-- Akhir Partner -->

        <!-- Awal Testimonial -->
        <section class="section-testimonial-heading" id="testimonialheading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>They Are Loving Us</h2>
                        <p>Moment were giving them <br>
                            the best experiance</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-testimonial-content" id="testimonial">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/picturemanandwoman/testi-1.png" alt="user" width="200"
                                    class="mb-4 rounded-circle">
                                <h3 class="mb-4">Alan Smith</h3>
                                <p class="testimonial">“It was glorious and i could
                                    not stop to say wohooo for
                                    every single moment
                                    Dankeeee”</p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip To Bunaken Island
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/picturemanandwoman/testi-2.png" alt="user" width="200"
                                    class="mb-4 rounded-circle">
                                <h3 class="mb-4">Marina Nicolasion</h3>
                                <p class="testimonial">“The trip was amazing and
                                    I saw something beautiful in
                                    that island that makes me
                                    want to learn more”</p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Tokyo, Japan
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/picturemanandwoman/testi-3.png" alt="user" width="200"
                                    class="mb-4 rounded-circle">
                                <h3 class="mb-4">Jimmy Hanamasa</h3>
                                <p class="testimonial">“I loved it when the waves was
                                    shaking harder-I was
                                    scared too”</p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Nusa Penida, Bali
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                            I NEED HELP
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-4 mx-1">
                            GET STARTED
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Akhir Testimonial -->

    </main>
@endsection