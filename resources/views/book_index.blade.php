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
                            <img class="img-lg" src="{{ asset("storage/".$book->cover) }}">
                            <a class="btn-overlay" href="#"><i class="fa fa-plus"></i> Add Wish List</a>
                        </div>
                        <figcaption class="info-wrap border-top">
                            @foreach($book->authors as $author)
                                    {{ $author->name }}{{ $loop->last ? '' : ','}}
                                @endforeach
                                <a href="{{ route('books.show', $book->id) }}" class="title"><h5> {{ $book->title }} </h5></a>
                                <h6>
                                @foreach($book->genres as $genre)
                                {{ $genre->genre }}{{ $loop->last ? '' : ','}}
                                @endforeach
                                </h6>
                                <hr>
                                <!-- vienoje eiluteje rikiavimas prie vieno ir kitos puses -->
                                <div class="mt-2">
                                        <span class="price">{{ $book->price }} $</span>
                                        {{--<small class="price-old">$14.99</small>--}}
                                    <ul class="rating-stars float-right">
                                        <ul class="rating-stars">
                                            <li style="width:{{ $book->allBookRating($book->reviews) }}%" class="stars-active">
                                                <img src="{{ asset("img/stars-active.svg") }}" alt="">
                                            </li>
                                            <li>
                                                <img src="{{ asset("img/starts-disable.svg") }}" alt="">
                                            </li>
                                        </ul>
                                    </ul>      
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

@endsection
