@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
    <div class="container-fluid pl-5 px-5"> 
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    </div>
    @endif

    @include('layouts.meniu_slider')
<section class="section-content padding-y">  
    <div class="icontext">
        <div class="icon icon-sm rounded-circle bg-light">
            <i class="fa fa-bell"></i>
            <span class="notify">3</span>
        </div>
    </div>
    <div class="container-fluid pl-5 px-5">        
    <div class="row">    
            <div class="row">
                @foreach($books as $book)           
                <div class="col-sm-custom">
                    <figure class="card card-product-grid">
                        <span class="badge-dark notify"><b>10 %</b></span>
                        <div class="img-wrap">
                            @if ($book->created_at_difference() <= 7)
                            <span class="badge badge-danger"> NEW </span>
                            @endif
                            <img src="{{ asset("storage/".$book->cover) }}">
                            <div class="btn-overlay">
                                @foreach($book->authors as $author)
                                {{ $author->name }},
                                @endforeach
                            </div>
                        </div> <!-- img-wrap.// -->
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="{{ route('book.show', $book->id) }}" class="title"><h4> {{ $book->title }} </h4></a>
                                <h6>
                                @foreach($book->genres as $genre)
                                {{ $genre->genre }},
                                @endforeach
                                </h6>
                                <!-- vienoje eiluteje rikiavimas prie vieno ir kitos puses -->
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <span class="float-md-left">
                                            <div class="rating-wrap mb-3">
                                                <ul class="rating-stars">
                                                    <li style="width:80%" class="stars-active"> 
                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                        <i class="fa fa-star"></i> 
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                                        <i class="fa fa-star"></i> 
                                                    </li>
                                                </ul>
                                            </div>
                                        </span>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <span class="float-md-right">
                                            <span class="price">$12</span>
                                            <del class="price-old">$19</del>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div> <!-- col.// -->
                @endforeach
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $books->links() !!}
                </div>
            </div> <!-- row end.// -->

    </div>
    
    </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

@endsection
