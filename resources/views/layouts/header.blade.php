<header class="section-header">
    <section class="header-main border-bottom">
        <div class="container-fluid pl-5 px-5">
    <div class="row align-items-center">
        <div class="col-lg-3 col-sm-4 col-md-4 col-5">
            <h2>BookShop</h2>
        </div>
        <div class="col-lg-4 col-xl-5 col-sm-8 col-md-4 d-none d-md-block">
                <form action="#" class="search">
                    <div class="input-group w-100">
                        <input type="text" class="form-control" style="width:55%;" placeholder="Search">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search"></i>
                          </button>
                        </div>
                    </div>
                </form> <!-- search-wrap .end// -->
        </div> <!-- col.// -->
        <div class="col-lg-5 col-xl-4 col-sm-8 col-md-4 col-7">
            <div class="d-flex justify-content-end">
                <a href="#" class="widget-header mr-3">
                    <div class="icon">
                        <i class="icon-sm rounded-circle border fa fa-shopping-cart"></i>
                        <span class="notify">0</span>
                    </div>
                </a>
                <a href="#" class="widget-header mr-3">
                    <div class="icon">
                        <i class="icon-sm rounded-circle border fa fa-heart"></i>
                    </div>
                </a>
    
                <div class="widget-header dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" data-offset="20,10" aria-expanded="false">
                        <div class="icon icon-sm rounded-circle border ">
                            <i class="fa fa-user"></i>
                        </div>
                        <span class="sr-only">Profile</span>
                    </a>
                    @guest
                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(64px, 46px, 0px);">
                        <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                        <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </div> <!--  dropdown-menu .// -->
                    @else  
                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(64px, 46px, 0px);">
                        <a class="dropdown-item" href="#">Profile setting</a>
                        <a class="dropdown-item" href="#">My orders</a>
                        <a class="dropdown-item" href="{{ url('admin') }}">Admin panel</a>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div> <!--  dropdown-menu .// -->
                    @endguest
                </div>  <!-- widget-header .// -->
    
            
            </div> <!-- widgets-wrap.// -->
        </div> <!-- col.// -->
    </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->
    
    
    <nav class="navbar navbar-expand-md navbar-main border-bottom">
      <div class="container-fluid pl-5 px-5">
              <form class="d-md-none my-2">
                <div class="input-group">
                    <input type="search" name="search" class="form-control" placeholder="Search" required="">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary"> <i class="fas fa-search"></i> </button>
                    </div>
                </div>
            </form>
    
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dropdown6">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="dropdown6">
                  <ul class="navbar-nav mr-auto"></ul>
                  <ul class="navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link">My items</a></li>
                    <li class="nav-item"><a href="{{ route('create') }}" class="btn btn-primary ml-md-4"><i class="fa fa-plus"></i> NEW Book</a></li>
                  </ul>
           </div> <!-- collapse .// -->
      </div> <!-- container .// -->
    </nav>
    
    </header> <!-- section-header.// -->