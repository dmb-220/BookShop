@extends('layouts.admin_app')

@section('content')
<div class="card">
    <div class="card-body">
        @forelse ($books as $book)
        <article class="card card-product-list">
            <div class="row no-gutters">
                <aside class="col-md-2">
                    <a href="{{ asset("storage/".$book->cover) }}" class="img-wrap">
                        <img src="{{ asset("storage/".$book->cover) }}">
                    </a>
                </aside>
                <div class="col-md-10">
                    <div class="info-main">
                        @if ($book->is_new)
                                <span class="topbar">
                                    <div class="float-right alert alert-info"><b>NEW</b></div>
                                </span>
                                @endif
                                @if ($book->discount)
                                <span class="topbar">
                                    <div class="float-right alert alert-danger"><b>{{ $book->discount }} %</b></div>
                                </span>
                                @endif
                        {{ $book->AuthorsList($book->authors) }}
                        <a href="{{ route('books.show', $book->id) }}">
                            <div class="h5 title"> {{ $book->title }}</div>
                        </a>
                        {{ $book->GenreList($book->genres) }}
                        <hr>
                        {{ $book->description }}
                        <hr>
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
                    </div>
                </div>
            </div>
        </article>  
    @empty       
    <p>No Book</p> 
    @endforelse
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $books->links() }}
    </div>
    </div>
</div>

@endsection 