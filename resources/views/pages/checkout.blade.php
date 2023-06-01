@extends('layouts.checkout')

@section('title', 'Checkout')

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
                            <li class="breadcrumb-item">
                                Details
                            </li>
                            <li class="breadcrumb-item active">
                                Checkout
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0 mb-4">
                    <div class="card card-details">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h1>Who’s Going?</h1>
                        <p class="location mb-3">Trip to {{ $item->travel_package->title }}, {{ $item->travel_package->location }}</p>
                        <div class="attendee">
                            <table class="table table-responsive-sm text-center">
                                <thead>
                                    <tr>
                                        <td>Picture</td>
                                        <td>Name</td>
                                        <td>Nasionality</td>
                                        <td>VISA</td>
                                        <td>Passport</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($item->details as $detail)
                                    <tr>
                                        <td>
                                            <img src="https://ui-avatars.com/api/?name={{ $detail->username}}"
                                                alt="going images" height="60px" class="rounded-circle" />
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->username }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->nationality }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $detail->is_visa ? '30 Days' : 'N/A' }}
                                        </td>
                                        <td class="align-middle">
                                            {{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ?  'Active' : 'Inactive' }}
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('checkout-remove', $detail->id) }}">
                                                X
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                No Visitor
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="member mt-3">
                            <h2>Add Members</h2>
                            <form action="{{ route('checkout-create', $item->id) }}" class="form-inline" method="POST">
                                @csrf
                                <label for="username" class="sr-only">Name</label>
                                <input type="text" name="username" class="form-control mb-2 mr-sm-2" id="username"
                                    placeholder="Username" required>

                                <label for="nationality" class="sr-only">Nationality</label>
                                <input type="text" name="nationality" class="form-control mb-2 mr-sm-2" id="nationality" style="width: 50px"
                                        placeholder="Nationality" required>

                                <label for="is_visa" class="sr-only">VISA</label>
                                <select name="is_visa" id="is_visa" class="custom-select mb-2 mr-sm-2" required>
                                    <option value="" selected>VISA</option>
                                    <option value="1">30 Days</option>
                                    <option value="0">N/A</option>
                                </select>

                                <label for="doe_passport" class="sr-only">DOE Passport</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="text" class="form-control datepicker" id="doe_passport" name="doe_passport"
                                        placeholder="DOE Passport">
                                </div>

                                <button type="submit" class="btn btn-add-now mb-2 px-2">
                                    Add Now
                                </button>
                            </form>
                            <h3 class="mt-2 mb-0">Note:</h3>
                            <p class="disclaner mb-0">
                                You are only able to invite member that has registered in &nbsp; <img
                                src="{{ url('frontend/images/logo/logo.png')}}" alt="Logo">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details-information card-right">
                        <h2>Checkout Information</h2>
                        <table class="trip-informations">
                            <tr>
                                <th width="50%" class="tag">Members</th>
                                <td width="50%" class="text-right tag"> {{ $item->details->count() }} Person</td>
                            </tr>
                            <tr>
                                <th width="50%" class="tag">Additional VISA</th>
                                <td width="50%" class="text-right tag"> $ {{ $item->additional_visa }},00</td>
                            </tr>
                            <tr>
                                <th width="50%" class="tag">Trip Price</th>
                                <td width="50%" class="text-right tag"> $ {{ $item->travel_package->price }},00/Person</td>
                            </tr>
                            <tr>
                                <th width="50%" class="tag">Total Price</th>
                                <td width="50%" class="text-right tag"> $ {{ $item->transaction_total }},00</td>
                            </tr>
                            <tr>
                                <th width="50%" class="tag">Total Pay (Uniq code)</th>
                                <td width="50%" class="text-right text-total">
                                    <span class="text-blue">$ {{ $item->transaction_total }},</span>
                                    <span class="text-orange">{{ mt_rand(0,99) }}</span>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <h2 class="payment-title">Payment Intructions</h2>
                        <p class="payment-intruction">
                            Please complate your payment before to continue the wonderful trip
                        </p>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="{{ url('frontend/images/icon/payment1.png')}}" alt="Payment" class="bank-images">
                                <div class="description">
                                    <h3>PT.HanaTourID</h3>
                                    <p>114256474800
                                        <br>
                                        Bank Central Asia
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="bank">
                            <div class="bank-item pb-3">
                                <img src="{{ url('frontend/images/icon/payment2.png')}}" alt="Payment" class="bank-images">
                                <div class="description">
                                    <h3>PT.HanaTourID</h3>
                                    <p>008435424363
                                        <br>
                                        Bank Mandiri
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="join-container">
                        <a href="{{ route('checkout_success', $item->id)}}" class="btn btn-block btn-join-trip-now mt-3 py-2">
                            I Have Made Payment
                        </a>
                    </div>
                    <a href="{{ route('details', $item->travel_package->slug) }}" class="cancel-booking">Cancel Booking</a>
                </div>
            </div>
        </div>
    </section>


</main>
@endsection

@push('prepend-style')
    <!-- css gijgo library date -->
    <link rel="stylesheet" href="{{ url('frontend/libraries/combined/css/gijgo.min.css')}}"/>
@endpush

@push('addon-script')
    <!-- gijgo library date -->
    <script src="{{ url('frontend/libraries/combined/js/gijgo.min.js') }}"></script>

    <!-- script custom -->
    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<img src="{{ url('frontend/images/icon/calender.png')}}" width="15px"/>'
                }
            })
        });

    </script>
@endpush