@extends('layouts.app')

@section('content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
    <div class="container-fluid pl-5 px-5">
    
    <div class="row">
        <aside class="col-md-3">
            
    <div class="card">
        <article class="filter-group">
            <header class="card-header">
                <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                    <i class="icon-control fa fa-chevron-down"></i>
                    <h6 class="title">ADMIN MENIU</h6>
                </a>
            </header>
            <div class="filter-content collapse show" id="collapse_1" style="">
                <div class="card-body"> 
                    <ul class="list-menu">
                    <li><a href="{{ url('genre') }}">Genre  </a></li>
                    <li><a href="#">Author </a></li>
                    <li><a href="#">Book verify  </a></li>
                    <li><a href="#">Clothes  </a></li>
                    <li><a href="#">Home items </a></li>
                    <li><a href="#">Animals</a></li>
                    <li><a href="#">People </a></li>
                    </ul>
    
                </div> <!-- card-body.// -->
            </div>
        </article> <!-- filter-group  .// -->
    </div> <!-- card.// -->
    
        </aside> <!-- col.// -->
        <main class="col-md-9">  
            admin valdymas
        </main> <!-- col.// -->
    
    </div>
    
    </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
    @include('layouts.footer')
    @endsection  