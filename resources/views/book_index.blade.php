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
                        <div class="img-wrap">
                            
                            @if ($book->is_new)
                            <span class="badge badge-info"> <b>NEW</b> </span>
                            @endif
                            <img class="img-lg" src="{{ asset("storage/".$book->cover) }}">
                            @if ($book->discount)
                            <span class="topbar">
                                <div class="float-right alert alert-danger"><b>{{ $book->discount }} %</b></div>
                            </span>
                            @endif
                            <a class="btn-overlay" href="#"><i class="fa fa-plus"></i> Add Wish List</a>
                        </div>
                        <figcaption class="info-wrap border-top">
                            {{ $book->ArrayToString($book->authors) }}
                            <a href="{{ route('book_show', $book) }}" class="title"><h5> {{ $book->title }} </h5></a>
                            <h6>
                                {{ $book->ArrayToString($book->genres) }}
                            </h6>
                            <hr>
                            <!-- vienoje eiluteje rikiavimas prie vieno ir kitos puses -->
                            <div class="mt-2">
                                @if ($book->discount)
                                <span class="price">{{ $book->discount_sum }} $</span>
                                <small class="price-old">{{ $book->price }} $</small>
                                @else
                                <span class="price">{{ $book->price }} $</span>
                                @endif
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
                </div>
                @endforeach
            </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {{ $books->links() }}
                </div>
    </div>
    
    </div>
    </section>

@endsection
