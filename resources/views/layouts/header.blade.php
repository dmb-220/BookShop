<header class="section-heading">
    <section class="header-main border-bottom">
        <div class="container-fluid pl-5 px-5">
    <div class="row align-items-center">
        <div class="col-lg-3 col-sm-4 col-md-4 col-5">
            <a href="{{ url('/') }}"><h1>BookShop</h1></a>
        </div>
        <div class="col-lg-4 col-xl-5 col-sm-8 col-md-4 d-none d-md-block">
                <form action="{{ route('search_view')}}" method="POST" class="search">
                    @csrf
                    <div class="input-group w-100">
                        <input type="text" name="search" class="form-control" style="width:55%;" placeholder="Search">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search"></i>
                          </button>
                          <a href="{{ route('books.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> New Book</a>
                        </div>
                    </div>
                </form>
        </div>
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
                    <a href="#" data-toggle="dropdown" data-offset="20,10" aria-expanded="false">
                        <div class="icontext">
                            <div class="icon">
                                <i class="icon-sm rounded-circle border fa fa-user"></i>
                            </div>
                            <div class="text">
                                @guest
                                <small class="text-muted">Sign in | Join</small>
                                @else
                                <small class="text-muted">Profile | Logout</small>
                                @endguest
                                <div>My account <i class="fa fa-caret-down"></i> </div>
                            </div>
                        </div>
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
                        @if (Auth::user()->isAdmin())
                        <a class="dropdown-item" href="{{ route('admin.admin.index') }}">Profile setting</a>
                        <a class="dropdown-item" href="{{ route('user.books.index') }}">My Books </a>
                        <a class="dropdown-item" href="{{ route('admin.books.index') }}">All Books </a>
                        <a class="dropdown-item" href="{{ route('admin.genres.index') }}">Genres </a>
                        <a class="dropdown-item" href="{{ route('admin.authors.index') }}">Authors </a>
                        <a class="dropdown-item" href="{{ route('admin.reviews.index') }}">Reviews </a>
                        <a class="dropdown-item" href="{{ route('admin.reports.index') }}">Reports </a>
                        @else
                        <a class="dropdown-item" href="{{ route('user.user.index') }}">Profile setting</a>
                        <a class="dropdown-item" href="{{ route('user.books.index') }}">Books </a>
                        <a class="dropdown-item" href="{{ route('user.reviews.index') }}">Reviews </a>
                        <a class="dropdown-item" href="{{ route('user.reports.index') }}">Reports </a>
                        @endif
                        
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
    </header> <!-- section-header.// -->