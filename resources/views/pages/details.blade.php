@extends('layouts.details')

@section('title', 'Detail Travel')

@section('content')
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Paket Travel
                            </li>
                            <li class="breadcrumb-item active">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1>{{ $item->title }}</h1>
                        <p class="location">{{ $item->location }}</p>
                        @if($item->galleries->count())
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <img src="{{ Storage::url($item->galleries->first()->image ) }}" alt="Trip Wisata" class="xzoom"
                                    id="xzoom-default" xoriginal="{{ Storage::url($item->galleries->first()->image ) }}">
                                </div>
                                <div class="xzoom-thumbs">
                                    @foreach ($item->galleries as $gallery)
                                        <a href="{{ Storage::url($gallery->image)}}">
                                            <img src="{{ Storage::url($gallery->image)}}" alt="Trip Wisata"
                                                class="xzoom-gallery" width="128" height="100"
                                                xpreview="{{ Storage::url($gallery->image)}}">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <h2>Tentang Wisata</h2>
                        <p>
                            {!! $item->about !!}
                        </p>
                        <div class="features row">
                            <div class="col-md-4">
                                <div class="description">
                                    <img src="{{ url('frontend/images/icon/icon-1.png')}}" alt="icon" class="features-image">
                                    <div class="description">
                                        <h3>Featured</h3>
                                        <p>{{ $item->featured_event }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 border-left">
                                <div class="description">
                                    <img src="{{ url('frontend/images/icon/icon-2.png')}}" alt="icon" class="features-image">
                                    <div class="description">
                                        <h3>Language</h3>
                                        <p>{{ $item->language }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 border-left">
                                <div class="description">
                                    <img src="{{ url('frontend/images/icon/icon-3.png')}}" alt="icon" class="features-image">
                                    <div class="description">
                                        <h3>Foods</h3>
                                        <p>{{ $item->foods }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details-information card-right">
                        <h2>Members are going</h2>
                        <div class="members my-2">
                            <img src="{{ url('frontend/images/picturemanandwoman/going1.png')}}" alt="images going members"
                                class="member-going-images">
                            <img src="{{ url('frontend/images/picturemanandwoman/going2.png')}}" alt="images going members"
                                class="member-going-images">
                            <img src="{{ url('frontend/images/picturemanandwoman/going3.png')}}" alt="images going members"
                                class="member-going-images">
                            <img src="{{ url('frontend/images/picturemanandwoman/going4.png')}}" alt="images going members"
                                class="member-going-images">
                            <img src="{{ url('frontend/images/picturemanandwoman/going5.png')}}" alt="images going members"
                                class="member-going-images">
                        </div>
                        <hr>
                        <h2>Trip Information</h2>
                        <table class="trip-informations">
                            <tr>
                                <th width="50%" class="information">Date Of Departure</th>
                                <td width="50%" class="text-right"> {{ \Carbon\Carbon::create($item->date_of_departure)->format('F, n, Y') }}</td>
                            </tr>
                            <tr>
                                <th width="50%" class="information">Duration</th>
                                <td width="50%" class="text-right"> {{ $item->duration }}</td>
                            </tr>
                            <tr>
                                <th width="50%" class="information">Type Of Trip</th>
                                <td width="50%" class="text-right"> {{ $item->type }}</td>
                            </tr>
                            <tr>
                                <th width="50%" class="information">Price</th>
                                <td width="50%" class="text-right"> ${{ $item->price }},00/Person</td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-container">
                        @auth
                        <form action="{{ route('checkout_process', $item->id) }}" method="POST">
                            @csrf
                                <button class="btn btn-block btn-join-trip-now mt-3 py-2" type="submit">
                                    Join Now
                                </button>
                            </form>
                        @endauth

                        @guest
                        <a href="{{ route('login')}}" class="btn btn-block btn-join-trip-now mt-3 py-2">
                            Login Or Register To Join
                        </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>
@endsection

@push('prepend-style')
    <!-- css xzoom -->
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css')}}">
@endpush

@push('addon-script')
    <!-- xzoom -->
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js')}}"></script>

    <!-- script custom -->
    <script>
        $(document).ready(function () {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                Xoffset: 15
            });
        });
    </script>
@endpush