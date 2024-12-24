<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown" style="padding-right:30px;">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
							      @if(!auth()->user()->profile == '')
                                    <img src="{{asset('images/' . auth()->user()->profile)}}" alt=""  class="avatar img-fluid rounded me-1">
                                  @else
                                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" class="avatar img-fluid rounded me-1" alt="https://ui-avatars.com/api/?" /> <span class="text-dark"></span>
								  @endif
                            </a>
							<div class="dropdown-menu dropdown-menu-end">
								<!-- <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a> -->
								<!-- <div class="dropdown-divider"></div> -->
								<a class="dropdown-item"  href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out</a>
								<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                                </form>
							</div>
						</li>
					</ul>
				</div>
			</nav>