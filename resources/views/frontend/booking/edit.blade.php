@extends('frontend.layouts.app')
@section('package','#08703A')
@section('content')

     <!--  ************************* Page Title Starts Here ************************** -->
    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>Booking</h2>
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
                Primary Info
            </h4>
            <div class="mt-3">
                <form method="POST" action="{{ route('booking.frontend.update', [$package->slug, $booking_info->id]) }}">
                    @csrf
                    @method('put')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Package</label>
                            <select id="inputState" class="form-control" name="package_id">
                                <option selected>Choose your package...</option>
                                @foreach ($packages as $key => $pack)
                                    <option value="{{ $pack->id }}" {{ $pack->id == $package->id ? 'selected' : '' }}>{{ $pack->title }}</option>
                                @endforeach
                            </select>
                            @error('package_id')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Number Of People</label>
                            <input type="number" name="number_of_person" class="form-control" id="inputPassword4" value="{{ $booking_info->number_of_person }}" min="{{ $package->quantity }}">
                            @error('number_of_person')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Note</label>
                        <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3">{{ $booking_info->note }}</textarea>
                        @error('note')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" id="inputCity" value="{{ $booking_info->User->phone }}">
                            @error('phone_number')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail4" value="{{ $booking_info->User->email }}">
                            @error('email')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Date of travel</label>
                            <input type="date" name="date_of_travel" class="form-control" id="inputCity" value="{{ $booking_info->date_of_travel }}">
                            @error('date_of_travel')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Payment Method</label>
                            <select id="inputState" class="form-control" name="payment_method">
                                <option value="kpay" {{ $booking_info->payment_method == 'kpay' ? 'selected' : ''}}>K Pay</option>
                                <option value="aya-pay" {{ $booking_info->payment_method == 'aya-pay' ? 'selected' : ''}}>AYA Pay</option>
                                <option value="wave-pay" {{ $booking_info->payment_method == 'wave-pay' ? 'selected' : ''}}>Wave Pay</option>
                            </select>
                            @error('payment_method')
                                                        <span class="" role="alert">
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        </span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn btn-primary">Edit Booking</button>
                </form>
            </div>
        </div>
    </section> 

   
@endsection
