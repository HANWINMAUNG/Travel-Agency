@extends('frontend.layouts.app')
@section('package','#08703A')
@section('content')

     <!--  ************************* Page Title Starts Here ************************** -->
    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>Travel Packages Detail</h2>
                <ul>
                    <li> <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="{{ route('package') }}"><i class="fas fa-angle-double-right"></i> Our Packages</a></li>
                    <li><i class="fas fa-angle-double-right"></i> Package Detail</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="about-us container-fluid">
    <div class="container">

        <div class="row natur-row no-margin w-100">
            <div class="image-part col-md-6">
            <a href="{{ route('package.detail', $package->slug) }}">
                @if(!$package->cover_photo == '')
                    <img src="{{asset('images/' . $package->cover_photo)}}" alt="" style="width:600px;height:485px;padding:10px;object-fit:contain;" class="">
                @else
                    <img src="{{asset('backend/assets/img/noimage.jpg')}}" alt="" style="width:600px;height:485px;padding:5px;object-fit:contain;" class="">
                @endif
            </a>
            </div>
            <div class="text-part col-md-6">
                <div class="d-flex justify-content-between">
                   <h2 style="color:#08703A;">{{ $package->title }}</h2>
                </div>
                <p><span class="h5">Price:</span>{{ $package->price }}<span style="color:#08703A;">MMK</span></p>
                <p><span class="h5">Quantity:</span>{{ $package->quantity }}</p>
                <p><span class="h5">Time:</span>{{ $package->date }}</p>
                <h2 style="color:#08703A;">Description</h2> 
                <p>
                    {!! $package->description !!}
                </p>
                <h2 style="color:#08703A;">Summary</h2> 
                <p>
                    {!! $package->summary !!}
                </p>
                
                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('booking.frontend.create', $package->slug) }}" class="btn btn-success py-2 px-3 rounded text-white my-1">Booking Now</a>
                </div>
            </div>
        </div>
    </div>
</div> 
       

    <!-- ################# Our Team Starts Here#######################--->
    <section class="our-team">
        <div class="container">
            <div class="session-title row">
                <h2>Related City</h2> 
            </div>
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($cities as $city)
                        <div class="swiper-slide">
                            <div class="row natur-row no-margin w-100">
                                    <div class="text-part col-md-6" style="margin-top:40px;">
                                        <div class="d-flex justify-content-between mb-4">
                                        <h2 style="">{{ $city->title }}</h2>
                                        </div>
                                        <h2 style="color:#08703A;">Summary</h2> 
                                        <p>
                                            {!! $city->summary !!}
                                        </p>
                                    </div>
                                    <div class="image-part col-md-6">
                                    <a href="{{ route('city.detail', [$package->slug,$city->slug]) }}">
                                        @if(!$city->cover == '')
                                            <img src="{{asset('images/' . $city->cover)}}" alt="" style="width:600px;height:485px;padding:px;object-fit:contain;" class="">
                                        @else
                                            <img src="{{asset('backend/assets/img/noimage.jpg')}}" alt="" style="width:600px;height:485px;padding:px;object-fit:contain;" class="">
                                        @endif
                                    </a>
                                    </div>
                            </div>
                        </div>
                    @endforeach              
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div> 
        </div>
    </section>
   
@endsection
@push('script')
<script type="text/javascript">
     const swiper = new Swiper('.swiper', {
                // Optional parameters
               
                loop: true,

                

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

               
                });

</script>
@endpush
