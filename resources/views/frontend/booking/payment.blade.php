@extends('frontend.layouts.app')
@section('package','#08703A')
@section('content')

     <!--  ************************* Page Title Starts Here ************************** -->
    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>Payment</h2>
                <ul>
                    <li> <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><i class="fas fa-angle-double-right"></i> Our Packages</li>
                </ul>
            </div>
        </div>
    </div>

     
     <!--################### Packages Starts Here #######################--->
    
    <section class="top-packages container-fluid">
        <div class="container">
            <h4>
                Payment State
            </h4>
            <hr>
            <a href="{{ route('booking.frontend.edit', [$booking_info->Package->slug, $booking_info->id]) }}" class="btn btn-info text-end mb-3">Edit Your Booking</a>
            <div class="mt-2">
                <div class="mb-5">
                    <div class="pb-2 d-flex justify-content-between">
                        <h6>Package Type</h6>
                        <span>{{ $booking_info->Package->title }}</span>
                    </div>
                    <div class="pb-2 d-flex justify-content-between">
                        <h6>Number Of Person</h6>
                        <span>{{ $booking_info->Package->quantity }}</span>
                    </div>
                    <div class="pb-2 d-flex justify-content-between">
                        <h6>Extra Person</h6>
                        <span>{{ $extra_person }}</span>
                    </div>
                    <div class="pb-2 d-flex justify-content-between">
                        <h6>Phone Number</h6>
                        <span>{{$booking_info->User->phone}}</span>
                    </div>
                    <div class="pb-2 d-flex justify-content-between">
                        <h6>Email Address</h6>
                        <span>{{$booking_info->User->email}}</span>
                    </div>
                    <div class="pb-2 d-flex justify-content-between">
                        <h6>Booking Date</h6>
                        <span>{{ Carbon\Carbon::parse($booking_info->created_at)->format('d:m:Y h:i:s') }}</span>
                    </div>
                    <div class="pb-2 d-flex justify-content-between">
                        <h6>Travel Date</h6>
                        <span>{{ Carbon\Carbon::parse($booking_info->date_of_travel)->format('d:m:Y h:i:s') }}</span>
                    </div>
                    <hr>
                    <div class="pb-2 d-flex justify-content-between">
                        <h6>Normal Amount</h6>
                        <span>{{ $booking_info->Package->price }} MMK</span>
                    </div>
                    <div class="pb-2 d-flex justify-content-between">
                        <h6>Extra Fee</h6>
                        <span>{{ $extra_person }} x 10000</span>
                    </div>
                    <div class="pb-2 d-flex justify-content-between">
                        <h6>Total Amount</h6>
                        <span>{{ $total_amount }} MMK</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-2">
            <h4>
                Payment
            </h4>
            <hr>
            <div class="mt-4">
                <form method="POST" action="{{ route('booking.frontend.payment.store', [$booking_info->Package->slug, $booking_info->id]) }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Account Number</label>
                            <input type="text" class="form-control" name="account_number" id="inputPassword4">
                            @error('account_number')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Amount</label>
                            <input type="text" class="form-control" value="{{ $total_amount }}" name="amount" id="inputPassword4" >
                            @error('amount')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                             @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <button class="btn btn-secondary w-100">Cancel</button>
                        </div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary w-100">Pay Now</button>
                        </div>
                    </div>    
                </form>
            </div>
        </div>
    </section> 

   
@endsection
