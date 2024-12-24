@extends('backend.layouts.app')
@section('city','active')
@push('header')
   <link href="{{asset('backend/assets/css/video.css')}}" rel="stylesheet"/>
@endpush
@section('content')
<main class="content">
	        <div class="container-fluid p-0">
		        <div class="d-flex justify-content-between">
                        <h1 class="h3 mb-3"><strong>City Edit Form</strong></h1>
                        <div class="py-3 d-flex flex-row-reverse">
                                <button class="btn btn-secondary back-btn">Back <i class="align-middle" data-feather="arrow-left"></i></button>
                        </div>
                </div>
                <div class="">
                    <div class="card">
                                <div class="card-body">
                                    <div class = "p-2">
                                            <!-- @include('backend.layouts.flash') -->
                                            <form action="{{ route('city.update' , $city->id) }}" method="post" id="create" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <div class="from-group">
                                                    <label for="">Title</label>
                                                    <input type="text" name="title" class="form-control" value="{{ $city->title }}">
                                                    @error('title')
                                                            <span class="" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                    @enderror 
                                                </div>
                                                <div class="from-group mt-2">
                                                        <label for="">Package(Region & State)</label>
                                                        <select name="package_id" class="form-control" >
                                                        @foreach($packages as $key => $package)
                                                                @if($key == $package_city)
                                                                <option value="{{$key}}" selected>{{ $package }}</option>
                                                                @else
                                                                <option value="{{$key}}">{{ $package }}</option>
                                                                @endif
                                                        @endforeach
                                                        </select>
                                                        @error('package_id')
                                                            <span class="" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror 
                                                </div>
                                                <div class="from-group mt-2">
                                                        <label for="">Image</label>
                                                        <input type="file" id="fileupload" name="image[]"  class="form-control" multiple>
                                                        <div class="validation text-danger pt-2" style="display:none;"> Upload Max 4 Files allowed </div>
                                                        @foreach($city_images as $city_image)
                                                        @if(!$city_image == '')
                                                        <img src="{{asset('images/' . $city_image)}}" alt="" style="width:200px;height:200px;padding:10px;object-fit:contain;" class="border border-dark w-full mt-2">
                                                        @else
                                                        <img src="{{asset('assets/img/noimage.jpg')}}" alt="" style="width:200px;height:200px;padding-top:10px;" class="pt-2">
                                                        @endif
                                                        @endforeach
                                                        @error('image')
                                                            <span class="" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror 
                                                </div>
                                                <div class="from-group mt-2">
                                                        <label for="">Cover Photo</label>
                                                        <input type="file" id="fileupload" name="cover" class="form-control ">
                                                        @if(!$city->cover == '')
                                                        <img src="{{asset('images/' . $city->cover)}}" alt="" style="width:200px;height:200px;padding:10px;object-fit:contain;" class="border border-dark w-full mt-2">
                                                        @else
                                                        <img src="{{asset('assets/img/noimage.jpg')}}" alt="" style="width:200px;height:200px;padding-top:10px;" class="pt-4">
                                                        @endif
                                                        @error('cover')
                                                            <span class="" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror 
                                                </div>
                                                <div class="from-group mt-2 d-none">
                                                        <label for="">Video</label>
                                                        <input type="file" id="fileupload" name="video" class="form-control">
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
                                                        <img src="{{asset('backend/assets/img/no-video.jpg')}}" alt="" style="width:100px;height:100px;padding-top:10px;" class="pt-2">
                                                        @endif
                                                        @error('video')
                                                            <span class="" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror 
                                                </div>
                                                <div class="from-group d-none">
                                                    <label for="">Video Link</label>
                                                    <input type="text" name="link" class="form-control" value="{{ $city->link }}">
                                                    @error('link')
                                                            <span class="" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                    @enderror 
                                                </div>
                                                <div class="from-group mt-2">
                                                        <label for="">Summary</label>
                                                        <textarea   name="summary"  id="inp_editor2" class="form-control">{!! $city->summary !!}</textarea>
                                                        @error('summary')
                                                            <span class="" role="alert">
                                                                <strong class="text-danger">{{ $message }}</strong>
                                                            </span>
                                                        @enderror 
                                                </div>
                                                <div class="d-flex justify-content-center mt-4">
                                                    <button class="btn btn-secondary back-btn" style="margin-right:10px;">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                    </div>
	            </div>				
	        </div>
</main> 
@endsection
@push('script')
{!! JsValidator::formRequest('App\Http\Requests\CityUpdateRequest','#update') !!}
<script src="{{asset('backend/assets/js/video.min.js')}}"></script>
<script type="text/javascript">
     var editor2 = new RichTextEditor("#inp_editor2");
</script>
<script>
    $(document).ready(function(){
        $('#fileupload').change(function(){
                var input = document.getElementById('fileupload');
                if(input.files.length >= 5){
                    $('.validation').css('display','block');
                }else{
                    $('.validation').css('display','none');
                }
                });
            });
</script>
@endpush