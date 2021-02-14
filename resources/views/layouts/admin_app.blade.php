<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/e1639eb0e9.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/my.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- fonticon -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('css/ui.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/my.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.header')
        <main class="py-4">
            <section class="section-content padding-y">
                <div class="container-fluid pl-5 px-5">
                <div class="row">
                    <div class="col-md-3">        
                    <div class="card">
                        <header class="card-header">
                            <h6 class="title">ADMIN MENIU</h6>
                        </header>
                        <div class="filter-content collapse show" id="collapse_1" style="">
                            <div class="card-body"> 
                                <ul class="list-menu">
                                    <li><a href="{{ route('admin.books.index') }}">Books </a></li>
                                    <li><a href="{{ route('admin.genres.index') }}">Genres </a></li>
                                    <li><a href="{{ route('admin.authors.index') }}">Authors </a></li>
                                    <li><a href="{{ route('admin.reviews.index') }}">Reviews </a></li>
                                    <li><a href="{{ route('admin.reports.index') }}">Reports </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> 
                    <div class="col-md-9">
                        @yield('content')
                    </div>
                </div>
            </div>
            </section>
        </main>
    @include('layouts.footer')
    </div>
</body>
</html>
