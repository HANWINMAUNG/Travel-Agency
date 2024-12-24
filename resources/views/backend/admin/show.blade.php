@extends('backend.layouts.app')
@section('admin','active')
@section('content')
<main class="content">
				<div class="container-fluid p-0">
                    <div class="d-flex justify-content-between">
                        <h1 class="h3 mb-3"><strong>Admin Detail</strong></h1>
                        <div class="py-3 d-flex flex-row-reverse">
                        <button class="btn btn-secondary back-btn">Back <i class="align-middle" data-feather="arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                            <div class="card col-md-6">
                                <div class="card-body">
                                    <div class = "p-2 text-center">
                                       <div class="row">
                                        <div class="col">
                                            <!-- <h5>Profile</h5> -->
                                            @if(!$admin_account->profile == '')
                                                <img src="{{asset('images/' . $admin_account->profile)}}" alt="" style="width:300px;height:200px;padding:5px;object-fit:contain;" class=" mb-4">
                                            @else
                                                <img src="{{asset('backend/assets/img/noimage.jpg')}}" alt="" style="width:300px;height:200px;padding:5px;object-fit:contain;" class="mb-4">
                                            @endif
                                        </div>
                                       </div>
                                    </div>
                                    <div class="mt-2">
                                            <h5>Name:{{$admin_account->name}}</h5>
                                            <h5>Email:{{$admin_account->email}}</h5>
                                            <h5>Phone:{{$admin_account->phone}}</h5>
                                            <h5>Gender:{{$admin_account->gender}}</h5>
                                            <h5>Address:{{$admin_account->address}}</h5>
                                    </div>
                                </div>
                            </div>
                    </div>				
				</div>
</main> 
@endsection