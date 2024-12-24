<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\BookingCreateRequest;

class AdminBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            return $this->dataTable();
        }

        return view('backend.booking.index');
    }
    private function dataTable()
    {
        $query = Booking::query();
        return DataTables::of($query)
                   ->order(function ($booking)
                   {
                    $booking->orderBy('created_at' , 'desc');
                   })
                   ->addColumn('package_name', function ($data) {
                    return $data->Package->title;
                   })
                   ->addColumn('user_name' , function($data)
                   {
                    return $data->User->name;
                   })
                    ->addColumn('date_of_travel', function ($data) {
                        return Carbon::parse($data->date_of_travel)->format('d-M-Y H:i:s');
                    })
                    ->addColumn('booking_date', function ($data) {
                        return Carbon::parse($data->updated_at)->format('d-M-Y H:i:s');
                    })
                   ->addColumn('action' , function($booking)
                   {
                    return view('backend.action.booking_action' , ['booking' => $booking]);
                   })
                   ->rawColumns(['action'])
                   ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Booking $booking)
    {
        $packages = Package::get();
        $users = User::get();
        return view('backend.booking.create', compact(['booking', 'packages','users']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingCreateRequest $request)
    {
        
        $attributes = $request->validated();
        
        Booking::create($attributes);
        return redirect()->route('booking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('backend.booking.show', compact(['booking']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $packages = Package::get();
        $users = User::get();
        return view('backend.booking.edit', compact(['booking', 'packages','users']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingRequest $request, Booking $booking)
    {
        $attributes = $request->validated();
        $booking->update($attributes);
        
        return redirect()->route('booking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return 'success';
    }
}
