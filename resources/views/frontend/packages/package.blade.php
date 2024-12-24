@extends('frontend.layouts.app')
@section('package','#08703A')
@section('content')

     <!--  ************************* Page Title Starts Here ************************** -->
    <div class="page-nav no-margin row">
        <div class="container">
            <div class="row">
                <h2>Travel Packages</h2>
                <ul>
                    <li> <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
                    <li><i class="fas fa-angle-double-right"></i> Our Packages</li>
                </ul>
            </div>
        </div>
    </div>

     
     <!--################### Packages Starts Here #######################--->
    
    <section class="top-packages container-fluid">
        <div class="container">
            <div class="mb-5">
            <div class="row">
                <div class="mb-2 col-md-4">
                    <h4>Filter with Region & State</h4>
                    <select id="categorySelect" class="form-control" name="package_id">
                        <option   class="select" selected>All</option>
                        @foreach ($categories as $key => $category)
                            <option value="{{ $category->slug }}" {{ request()->input('category') == $category->slug ? 'selected' : ''  }}>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="pack-row row">
                @foreach ($packages as $package)
                    
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
            <div class="d-flex justify-content-end">
                {{ $packages->links() }}
            </div>
        </div>
    </section> 
@endsection

 @push('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#categorySelect').on('change', function () {
                var selectOption = $(this).val();
                var baseUrl = window.location.href.split('?')[0];
                var url = baseUrl + '?category=' + selectOption;
                window.location.href = url;
            })
            $('.select').on('click' , function(){
                    let change_location = "{{ route('package') }}";
                    window.location = `${change_location}`;
             });
        })
    </script>
@endpush
