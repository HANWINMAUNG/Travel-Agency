@extends('backend.layouts.app')
@section('category','active')
@section('content')
<main class="content">
				<div class="container-fluid p-0">
                    <div class="d-flex justify-content-between">
                        <h1 class="h3 mb-3"><strong>Category Detail</strong></h1>
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
                                            <h5>Title</h5>
                                            <p>-{{$category->title}}</p>
                                        </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                    </div>				
				</div>
</main> 
@endsection