@extends('backend.layouts.app')
@section('city','active')
@push('header')
   <link href="{{asset('backend/assets/css/video.css')}}" rel="stylesheet"/>
@endpush
@section('content')
<main class="content">
				<div class="container-fluid p-0">
                    <div class="d-flex justify-content-between">
                        <h1 class="h3 mb-3"><strong>City Detail</strong></h1>
                        <div class="py-3 d-flex flex-row-reverse">
                        <button class="btn btn-secondary back-btn">Back <i class="align-middle" data-feather="arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="">
                            <div class="card">
                                <div class="card-body">
                                    <div class = "p-2">
                                       <div class="row">
                                        <div class="col-12 d-flex justify-content-between">
                                           <div class="">
                                            <h5>Images</h5>
                                                    @foreach($city_images as $city_image)
                                                        @if(!$city_image == '')
                                                        <img src="{{asset('images/' . $city_image)}}" alt="" style="width:200px;height:200px;padding:10px;object-fit:contain;" class="border border-dark w-full mt-2">
                                                        @else
                                                        <img src="{{asset('assets/img/noimage.jpg')}}" alt="" style="width:200px;height:200px;padding-top:10px;" class="pt-2">
                                                        @endif
                                                    @endforeach
                                           </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mt-4">
                                                                <h5>Cover Photo</h5>
                                                                @if(!$city->cover == '')
                                                                <img src="{{asset('images/' . $city->cover)}}" alt="" style="width:400px;height:200px;padding:10px;object-fit:contain;" class="border border-dark w-full mt-2">
                                                                @else
                                                                <img src="{{asset('assets/img/noimage.jpg')}}" alt="" style="width:400px;height:200px;padding-top:10px;" class="pt-4">
                                                                @endif
                                                </div>
                                            </div>
                                            <div class="col-6 d-none">
                                                        <div class="mt-4">
                                                            <h5>Video</h5>
                                                            @if(!$city->video == '')
                                                                            <div style="padding-top:10px;" >
                                                                                <video
                                                                                        id="my-video"
                                                                                        class="video-js"
                                                                                        controls
                                                                                        preload="auto"
                                                                                        width="400"
                                                                                        height="200"
                                                                                        padding="40"
                                                                                        poster="MY_VIDEO_POSTER.jpg"
                                                                                        data-setup="{}"
                                                                                    >
                                                                                        <source src="{{asset('videos/' . $city->video)}}" type="video/mp4" />
                                                                                        <p class="vjs-no-js">
                                                                                            Top to view
                                                                                        </p>
                                                                                </video>
                                                                            </div>
                                                            @else
                                                            <img src="{{asset('backend/assets/img/no-video.jpg')}}" alt="" style="width:200px;height:200px;padding-top:10px;" class="pt-2">
                                                            @endif
                                                        </div>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <div>
                                                <h5>Title</h5>
                                                <p>-{{ $city->title }}</p>
                                            </div>
                                            <div>
                                                <h5>Region & State</h5>
                                                <p>-{{ $city->Package->title }}</p>
                                            </div>
                                            <div>
                                                <h5>Summary</h5>
                                                <span>{!! $city->summary !!}</span>
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
@push('script')
<script src="{{asset('backend/assets/js/video.min.js')}}"></script>
@endpush