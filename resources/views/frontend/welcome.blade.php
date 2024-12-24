@extends('frontend.layouts.app')
@section('home','#08703A')
@section('content')
    <!--################### Slider Starts Here #######################--->

    <div class="slider-detail">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item ">
                    <img class="d-block " src="{{asset('frontend/assets/images/slider/banner2.jpg')}}" alt="First slide" style="width:1512px;height:500px;">
                    <div class="carousel-caption fvgb d-none d-md-block">
                        <h5 class="animated bounceInDown">Welcome Our Travel Agency </h5>
                        <p class="animated fadeInLeft">Welcome to our travel agency, where your journey begins the moment you walk through our doors. We are passionate about turning your travel dreams into reality, offering personalized services that cater to your unique tastes and preferences.</p>

                        <div class="row vbh">

                            <!-- <div class="btn btn-primary animated bounceInUp"> Apply Online </div> -->
                        </div>
                    </div>
                </div>

                <div class="carousel-item ">
                    <img class="d-block " src="{{asset('frontend/assets/images/slider/banner1.webp')}}" alt="Third slide" style="width:1512px;height:500px;">
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class="animated bounceInDown">Welcome Our Travel Agency</h5>
                        <p class="animated bounceInLeft">Welcome to our travel agency, where your journey begins the moment you walk through our doors. We are passionate about turning your travel dreams into reality, offering personalized services that cater to your unique tastes and preferences.</p>

                        <div class="row vbh">

                            <!-- <div class="btn btn-primary animated bounceInUp"> Apply Online </div> -->
                        </div>
                    </div>
                </div>
                <div class="carousel-item active">
                    <img class="d-block " src="{{asset('frontend/assets/images/slider/banner3.jpg')}}" alt="First slide" style="width:1512px;height:500px;">
                    <div class="carousel-caption fvgb d-none d-md-block">
                        <h5 class="animated bounceInDown">Welcome Our Travel Agency </h5>
                        <p class="animated fadeInLeft">Welcome to our travel agency, where your journey begins the moment you walk through our doors. We are passionate about turning your travel dreams into reality, offering personalized services that cater to your unique tastes and preferences.</p>

                        <div class="row vbh">

                            <!-- <div class="btn btn-primary animated bounceInUp"> Apply Online </div> -->
                        </div>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>
    
    <section class="top-packages container-fluid">
        <div class="container">
            <div class="session-title row">
                <h2>Travel Packages</h2>
            </div>
            <div class="pack-row row">
                @foreach($packages->take(6) as $package)
                    <div class="col-md-4">
                        <div class="pac-col">
                        <a href="{{ route('package.detail', $package->slug) }}">
                        @if(!$package->image == '')
                            <img src="{{asset('images/' . $package->image )}}" alt="" style="width:360px;height:288px;padding:px;object-fit:contain;" class=" w-full">
                        @else
                            <img src="{{asset('backend/assets/img/noimage.jpg')}}" alt="" style="width:360px;height:288px;padding:px;object-fit:contain;" class="">
                        @endif
                        </a>
                            
                            <div class="packdetail">
                                <a href="{{ route('package.detail', $package->slug) }}">
                                    <h4>{{ Illuminate\Support\Str::limit($package->title, 10, ' ...') }}</h4>
                                </a>
                                <div class="daydet">
                                    <a href="{{ route('package.detail', $package->slug) }}">
                                       <span><i class="far fa-clock"></i>{{ $package->date }}</span>
                                    </a>
                                    <a href="{{ route('package.detail', $package->slug) }}">
                                       <b>{{ $package->price }} MMK</b>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
     <!--################### Offers Starts Here #######################--->
    
    <div class="lloking-for container-fluid d-none">
        <div class="inn-lay">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 natur-col mx-auto">
                        <h2>Up to 40% Discount on Selected Packages</h2>
                        <h4 class="pt-3">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form  If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</h4>
                        <!-- <button class="btn btn-light">Book Now</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>  
    
    
    <!--  ************************* Blog Starts Here ************************** -->
    
    
    
     <!-- ******************** Travel Destination Starts Here ******************* -->
    
    <div class="travel-destination container-fluid">
        <div class="container">
            <div class="session-title">
                <h2>Popular Destination</h2>
                <p>Myanmar, a land of golden pagodas and rich cultural heritage, is home to several popular destinations that captivate travelers from around the world. Bagan, with its vast plains dotted by thousands of ancient temples, offers a breathtaking glimpse into the country's spiritual past, especially during sunrise or sunset. Inle Lake, famous for its floating gardens and traditional leg-rowing fishermen, provides a serene escape surrounded by nature's beauty. The bustling city of Yangon, with the iconic Shwedagon Pagoda at its heart, showcases a blend of colonial architecture and vibrant local culture. Whether you're exploring the sacred sites of Mandalay or relaxing on the pristine beaches of Ngapali, Myanmar </p>
            </div>
            <div class="destination-row row">
                @foreach($citys->take(8) as $city)
                    <div class="col-md-3 descol">
                    <a href="{{ route('city.destination.detail', [$city->slug]) }}">
                    <div class="destcol">
                        @if(!$city->cover == '')
                            <img src="{{asset('images/' . $city->cover )}}" alt="" style="width:262px;height:187px;padding:px;object-fit:contain;" class=" w-full">
                        @else
                            <img src="{{asset('backend/assets/img/noimage.jpg')}}" alt="" style="width:262px;height:187px;padding:px;object-fit:contain;" class="">
                        @endif
                        <div class="layycover">
                            <h4>{{ Illuminate\Support\Str::limit($city->title, 10, ' ...') }} <span class="badge badge-info"></span></h4>
                        </div>
                    </div>
                     </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
