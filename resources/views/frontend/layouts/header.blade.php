<header class="container-fluid">
       <div class="header-top">
            <div class="container">
              <div class="row">
                <div class="col-sm-4 d-none d-sm-block contacthd">
                  <p><a href="">Myanmar</a></p>
                </div>
                <div class="col-sm-8">

                  <ul class="social-login">
                    <li>
                      <i class="fab fa-facebook-square"></i>
                    </li>
                    <li>
                      <i class="fab fa-twitter-square"></i>
                    </li>
                    <li>
                      <i class="fab fa-instagram"></i>
                    </li>
                    <li>
                      <i class="fab fa-linkedin"></i>
                    </li>
                  </ul>

                  <ul class="email">
                    <li><i class="fa fa-envelope"></i>travelagency@gamil.com</li>
                  </ul>
                </div>
              </div>
            </div>

       </div>
       <div id="menu-jk" class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="logo col-md-2">
                        <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="">
                        <a data-toggle="collapse" data-target="#menu" href="#menu"><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                    </div>
                    <div id="menu" class="navs d-none d-md-block col-md-9">
                        <ul class="">
                            <li><a href="{{ route('home') }}" style="color:@yield('home');">Home</a></li>
                            <li><a href="{{ route('about') }}" style="color:@yield('about');">About Us</a></li>
                            <li><a href="{{ route('package') }}" style="color:@yield('package');">Packages</a></li>
                            <li><a href="{{ route('destinations') }}" style="color:@yield('destinations');">Destinations</a></li>
                            <!-- <li><a href="{{ route('blog') }}" style="color:@yield('blog');">Blog</a></li> -->
                            <li><a href="{{ route('contact') }}" style="color:@yield('contact');">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-1">
                          @if(auth()->user())
                              <!-- <li class="button-header margin-left "><a href="" class="text-dark">{{ auth()->user()->name }}</a></li> -->
                              <li class="button-header mt-4"><a href="{{ route('logout') }}" class="btn btn3">Logout</a></li>
                          @endif
                    </div>
                   
                </div>
            </div>
        </div>
  </header>

                
           
         