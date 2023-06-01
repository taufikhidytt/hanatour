@extends('layouts.success')

@section('title', 'Checkout Success')

@section('content')
<main>
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{ url('frontend/images/icon/icon-success.png')}}" alt="Icon-success">
            <h1>Yaay! Success</h1>
            <p>We sent you email for trip <br>
                intruction please read it as well</p>
            <a href="{{ url('/')}}" class="btn btn-home-page mt-3 px-5">
                Home Page
            </a>
        </div>
    </div>
</main>
@endsection