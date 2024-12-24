@extends('backend.layouts.app')
@section('package','active')
@section('content')
<main class="content">
				<div class="container-fluid p-0">
                    <div class="d-flex justify-content-between">
                        <h1 class="h3 mb-3"><strong>Package Detail</strong></h1>
                        <div class="py-3 d-flex flex-row-reverse">
                        <button class="btn btn-secondary back-btn">Back <i class="align-middle" data-feather="arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="">
                            <div class="card">
                                <div class="card-body">
                                    <div class = "p-2">
                                       <div class="row">
                                        <div class="col-6 d-flex justify-content-between">
                                           <div class="">
                                            <h5>Images</h5>
                                                @if(!$package->image == '')
                                                    <img src="{{asset('images/' . $package->image)}}" alt="" style="width:200px;height:200px;padding:10px;object-fit:contain;" class="border border-dark w-full mb-4">
                                                @else
                                                    <img src="{{asset('backend/assets/img/noimage.jpg')}}" alt="" style="width:300px;height:200px;padding:5px;object-fit:contain;" class="mb-4">
                                                @endif
                                           </div>
                                           <div class="">
                                            <h5>Cover Photo</h5>
                                                @if(!$package->cover_photo == '')
                                                    <img src="{{asset('images/' . $package->cover_photo)}}" alt="" style="width:200px;height:200px;padding:10px;object-fit:contain;" class="border border-dark w-full mb-4">
                                                @else
                                                    <img src="{{asset('backend/assets/img/noimage.jpg')}}" alt="" style="width:300px;height:200px;padding:5px;object-fit:contain;" class="mb-4">
                                                @endif
                                           </div>
                                        </div>
                                        <div class="mt-2">
                                            <div>
                                                <h5>Title</h5>
                                                <p>-{{ $package->title }}</p>
                                            </div>
                                            <div>
                                                <h5>Price</h5>
                                                <p>-{{ $package->price }} MMK</p>
                                            </div>
                                            <div>
                                                <h5>Quantity</h5>
                                                <p>-{{ $package->quantity }}</p>
                                            </div>
                                            <div>
                                                <h5>Date</h5>
                                                <p>-{{ $package->date }}</p>
                                            </div>
                                            <div>
                                                <h5>Category</h5>
                                                <p>-{{ $package_category }}</p>
                                            </div>
                                            <div>
                                                <h5>Description</h5>
                                                <span>{!! $package->description !!}</span>
                                            </div>
                                            <div>
                                                <h5>Summary</h5>
                                                <span>{!! $package->summary !!}</span>
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