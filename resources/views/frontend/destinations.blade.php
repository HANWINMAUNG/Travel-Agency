@extends('frontend.layouts.app')
@section('destinations','#08703A')
@section('content')

    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>Travel Destinations</h2>
                <ul>
                    <li> <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><i class="fas fa-angle-double-right"></i> Our Destinations</li>
                </ul>
            </div>
        </div>
    </div>

     <!-- ******************** Travel Destination Starts Here ******************* -->
    
    <div class="travel-destination container-fluid">
        <div class="container">
            
            <div class="destination-row row">
            @foreach ($citys as $city)
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
            <div class="d-flex justify-content-end">
                {{ $citys->links() }}
            </div>
        </div>
    </div>
    
@endsection
