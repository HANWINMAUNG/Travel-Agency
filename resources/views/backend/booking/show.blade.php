@extends('backend.layouts.app')
@section('booking','active')
@section('content')
<main class="content">
				<div class="container-fluid p-0">
                    <div class="d-flex justify-content-between">
                        <h1 class="h3 mb-3"><strong>Booking Detail</strong></h1>
                        <div class="py-3 d-flex flex-row-reverse">
                        <button class="btn btn-secondary back-btn">Back <i class="align-middle" data-feather="arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="">
                            <div class="card">
                                <div class="card-body">
                                    <div class = "p-2">
                                       <div class="row">
                                        <div class="mt-2">
                                            <div>
                                                <h5>Package Title</h5>
                                                <p>-{{ $booking->Package->title }}</p>
                                            </div>
                                            <div>
                                                <h5>User Name</h5>
                                                <p>-{{ $booking->User->name }}</p>
                                            </div>
                                            <div>
                                                <h5>Number Of People</h5>
                                                <p>-{{ $booking->number_of_person }}</p>
                                            </div>
                                            <div>
                                                <h5>Phone</h5>
                                                <p>-{{ $booking->User->phone }}</p>
                                            </div>
                                            <div>
                                                <h5>Email</h5>
                                                <p>-{{ $booking->User->email}}</p>
                                            </div>
                                            <div>
                                                <h5>Date</h5>
                                                <span>{{ $booking->date_of_travel }}</span>
                                            </div>
                                            <div>
                                                <h5>Note</h5>
                                                <span>{!! $booking->note !!}</span>
                                            </div>
                                        </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                    </div>				
				</div>
</main> 
@endsection