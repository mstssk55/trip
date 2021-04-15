@section('header')

           <!-- Navbar -->
           <header>
      <nav class="js-navbar-scroll navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}">
                <!--<img src="assets/img/logo-white.png" alt="Stream UI Kit" style="width: 100px;">-->
                ロゴ
              </a>

              <button class="navbar-toggler" type="button" 
                    　data-toggle="collapse" 
                    　data-target="#navbarSupportedContent"
              　　　　　aria-controls="navbarSupportedContent"
              　　　　　aria-expanded="false"
              　　　　　aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarTogglerDemo05">
                <ul class="navbar-nav ml-auto mt-1 mt-lg-0">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if(Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                  <!--<li class="nav-item active mx-2">-->
                  <!--  <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>-->
                  <!--</li>-->
                  <!--<li class="nav-item mx-2">-->
                  <!--  <a class="nav-link" href="">About</a>-->
                  <!--</li>-->
                  <!--<li class="nav-item mx-2">-->
                  <!--  <a class="nav-link" href="">Services</a>-->
                  <!--</li>-->
                  <!--<li class="nav-item mx-2">-->
                  <!--  <a class="nav-link" href="">Our Work</a>-->
                  <!--</li>-->
                  <!--<li class="nav-item mx-2">-->
                  <!--  <a class="nav-link" href="">Contacts</a>-->
                  <!--</li>-->
                </ul>

                <ul class="ml-auto navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(Auth::user()->icon!='')
                            <img class="rounded-circle u-box-shadow-sm mr-2" width="35" height="35" src="{{asset('storage/icon/'.Auth::user()->icon)}}" alt="Image Description">{{Auth::user()->name}}<i class="fas fa-angle-down small ml-1"></i>
                        @else
                            <img class="rounded-circle u-box-shadow-sm mr-2" width="35" height="35" src="{{asset('storage/icon/default.png')}}" alt="Image Description">{{Auth::user()->name}}<i class="fas fa-angle-down small ml-1"></i>
                        @endif
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="/">Profile</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                            </form>
                    </div>
                  </li>
                  @endguest
                </ul>
              </div>
            </div>
          </nav>
          
      
    </header>

@endsection