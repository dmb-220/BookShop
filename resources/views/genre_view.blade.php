@extends('layouts.admin_app')

@section('content')
@if ($message = Session::get('success'))
    <div class="container-fluid"> 
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    </div>
@endif


<div class="card">
    <header  class="card-header">
        Book list
    </header>
    <div class="card-body">
        @forelse ($books as $book)
        <article class="card card-product-list">
            <div class="row no-gutters">
                <aside class="col-md-2">
                    <a href="{{ asset("storage/".$book->cover) }}" class="img-wrap">
                        @if ($book->created_at_difference() <= 7)
                            <span class="badge badge-danger"> NEW </span>
                        @endif
                        <img src="{{ asset("storage/".$book->cover) }}">
                    </a>
                </aside>
                <div class="col-md-10">
                    <div class="info-main">
                        {{ $book->AuthorsList($book->authors) }}
                        <a href="{{ route('books.show', $book->id) }}">
                            <div class="h5 title"> {{ $book->title }}</div>
                        </a>
                        {{ $book->GenreList($book->genres) }}
                        <hr>
                        {{ $book->description }}
                        <hr>
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
                    </div>
                </div>
            </div>
        </article>  
    @empty       
    <p>No Book</p> 
    @endforelse
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $books->links() !!}
    </div>
    </div>
</div>

@endsection 