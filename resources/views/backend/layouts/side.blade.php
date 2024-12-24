<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<div class="sidebar-brand">
                    <span class="align-middle">Travel Packages Management System</span>
                </div>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>
					<li class="sidebar-item @yield('home')">
						<a class="sidebar-link" href="{{ route('admin.home')}}">
                          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                         </a>
					</li>

					<li class="sidebar-item @yield('admin')">
						<a class="sidebar-link" href="{{ route('admin-account.index') }}">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Admin Account</span>
                        </a>
					</li>

					<li class="sidebar-item @yield('user')">
						<a class="sidebar-link" href="{{ route('user-account.index') }}">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">User Account</span>
                        </a>
					</li>

					<li class="sidebar-item @yield('category')">
						<a class="sidebar-link" href="{{ route('category.index') }}">
                            <i class="align-middle" data-feather="align-justify"></i> <span class="align-middle">Category</span>
                        </a>
					</li>

					<li class="sidebar-item @yield('package')">
						<a class="sidebar-link" href="{{ route('package.index') }}">
                            <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Package</span>
                        </a>
					</li>

					<li class="sidebar-item @yield('city')">
						<a class="sidebar-link" href="{{ route('city.index') }}">
                            <i class="align-middle" data-feather="map"></i> <span class="align-middle">City</span>
                        </a>
					</li>
					
					<li class="sidebar-item @yield('booking')">
						<a class="sidebar-link" href="{{ route('booking.index') }}">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Booking</span>
                        </a>
					</li>
				</ul>
			</div>
</nav>