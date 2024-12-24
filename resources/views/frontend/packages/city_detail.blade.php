@extends('frontend.layouts.app')
@section('package','#08703A')
@section('content')

     <!--  ************************* Page Title Starts Here ************************** -->
    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>Travel City Detail</h2>
                <ul>
                    <li> <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="{{ route('package') }}"><i class="fas fa-angle-double-right"></i> Our Packages</a></li>
                    <li class="back-btn"><i class="fas fa-angle-double-right"></i> Package Detail</li>
                    <li><i class="fas fa-angle-double-right"></i> City Detail</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="about-us container-fluid">
    <div class="container">
    
        <div class="row natur-row no-margin w-100">
            <div class="image-part col-md-6">
            @if(!$city->cover == '')
                    <img src="{{asset('images/' . $city->cover)}}" alt="" style="width:600px;height:485px;padding:px;object-fit:contain;" class="">
            @else
                     <img src="{{asset('backend/assets/img/noimage.jpg')}}" alt="" style="width:600px;height:485px;padding:px;object-fit:contain;" class="">
            @endif
            </div>
            <div class="text-part col-md-6" style="margin-top:99px;">         
                <div >
                   <h2 style="color:#08703A;">Summary</h2> 
                   <p> {!! $city->summary !!}</p>
                </div>
            </div>
        </div>
   
    </div>
</div> 
       

    <!-- ################# Our Team Starts Here#######################--->
    <section class="our-team">
        <div class="container">
            <div class="session-title row">
                <h2>Related City Photo</h2> 
            </div>
            <div id="carouselExampleControls" class="carousel slide d-flex justify-content-center" data-ride="carousel">
                                @foreach($city_images as $city_image)
                                @if(!$city_image == '')
                                    <img src="{{asset('images/' . $city_image)}}" alt="" style="width:400px;height:200px;padding:10px;object-fit:contain;" class="border border-dark w-full mt-2 ml-4">
                                @else
                                <img src="{{asset('assets/img/noimage.jpg')}}" alt="" style="width:400px;height:200px;padding-top:10px;" class="pt-2">
                                @endif
                                @endforeach
            </div>
            <div class="row team-row">
                
            </div>
        </div>
    </section>
   
@endsection
@push('script')
<script>
    $(document).ready(function(){
                $('.back-btn').on('click' , function(){
				window.history.go(-1);
				return false;
			   
            }); });
</script>
@endpush