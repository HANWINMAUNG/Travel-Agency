<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontend\BookingRequest;

class BookingController extends Controller
{
    public function create(Package $package) {
        $packages = Package::get();
        $user = Auth::user();
        return view('frontend.booking.index', compact('packages', 'package', 'user'));
    }

    public function store(BookingRequest $request,Package $package) {
        $attributes = $request->validated();
        $attributes['user_id'] = Auth::user()->id;

        $booking = Booking::create($attributes);

        return redirect()->route('booking.frontend.payment', [$booking->Package->slug, $booking->id]);
    }

    public function edit(Package $package, $id) {
        $booking_info = Booking::where('id', $id)->with('Package')->first();
        $packages = Package::get();
        $user = json_decode($booking_info->user_info, true);
        return view('frontend.booking.edit', compact('packages', 'package', 'booking_info', 'user'));
    }

    public function update(BookingRequest $request, Package $package, $id) {
        $attributes = $request->validated();
        $booking_info = Booking::where('id', $id)->with('Package')->first();
        $booking_info->update($attributes);

        return redirect()->route('booking.frontend.payment', [$booking_info->Package->slug, $booking_info->id]);
    }

    public function payment(Package $package, $id) {
        $booking_info = Booking::where('id', $id)->with('Package')->first();
        $extra_person = $booking_info->number_of_person - $package->quantity;
        $total_amount = $package->price;
        if($extra_person !== 0) {
            $total_amount = $package->price + ($extra_person * 10000);
        }

        $user = json_decode($booking_info->user_info, true);
        
        return view('frontend.booking.payment', compact('extra_person', 'total_amount', 'user', 'booking_info'));
    }

    public function paymentStore(Request $request,Package $package, $id) {
        $attributes = $request->validate(
            [
                'account_number' => 'required',
                'amount' => 'required'
            ]
        );
        $attributes['booking_id'] = $id;

        $payment = Payment::create($attributes);

        $booking_info = Booking::where('id', $id)->with('Package')->first();
        $extra_person = $booking_info->number_of_person - $package->quantity;
        $total_amount = $package->price;
        if ($extra_person !== 0) {
            $total_amount = $package->price + ($extra_person * 1000);
        }

        $user = json_decode($booking_info->user_info, true);

        return view('frontend.booking.receipt', compact('extra_person', 'total_amount', 'user', 'booking_info', 'payment'));
    }
}
