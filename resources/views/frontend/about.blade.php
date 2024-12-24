@extends('frontend.layouts.app')
@section('about','#08703A')
@section('content')

    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>About Tour & Travel</h2>
                <ul>
                    <li> <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><i class="fas fa-angle-double-right"></i> About Us</li>
                </ul>
            </div>
        </div>
    </div>
     
      
  <!--  ************************* About Us Starts Here ************************** -->    
       
    <div class="about-us container-fluid">
        <div class="container">

            <div class="row natur-row no-margin w-100">
                <div class="text-part col-md-6">
                    <h2>About Travel Packages</h2>
                    <p>Travel packages offer a convenient and cost-effective way to explore new destinations, bundling together accommodations, transportation, and activities into a single,package.</p>
                    <p> Whether you're seeking a relaxing beach getaway, an adventurous trek through the mountains, or a cultural immersion in a foreign city, travel packages can be tailored to suit your preferences, making the planning process easier and ensuring a smooth, enjoyable experience. </p>

                    <p> By choosing a package, travelers can enjoy the peace of mind that comes with having the logistics handled, allowing them to focus on making memories.</p>
                </div>
                <div class="image-part col-md-6">
                    <img src="{{asset('frontend/assets/images/about.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div> 
       

    <!-- ################# Our Team Starts Here#######################--->
    <section class="our-team">
        <div class="container">
            <div class="session-title row">
                <h2>Our Team</h2>
               
            </div>
            <div class="row team-row d-flex justify-content-center">
                <div class="col-md-3 col-sm-6">
                    <div class="single-usr">
                        <img src="{{asset('frontend/assets/images/may.jpeg')}}" alt="">
                        <div class="det-o">
                            <h4>May Thae Cho</h4>
                            <i>Former</i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-usr">
                        <img src="{{asset('frontend/assets/images/ei.jpeg')}}" alt="">
                        <div class="det-o">
                            <h4>Phyu Phyu Ei Chaw</h4>
                            <i>Former</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    

   
@endsection
