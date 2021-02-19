@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="container-fluid pl-5 px-5"> 
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
</div>
@endif

<section class="section-content padding-y bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row no-gutters">
                        <aside class="col-md-4">
                            <article class="gallery-wrap">
                                <div class="img-big-wrap padding-y-sm">
                                    <div><a href="{{ asset("storage/".$book->cover) }}"><img src="{{ asset("storage/".$book->cover) }}"></a></div>
                                </div> 
                            </article>
                        </aside>
                        <main class="col-md-8 border-left">
                            <article class="content-body">
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
                                
                                {{ $book->ArrayToString($book->authors) }}
                                <h2 class="title">{{$book->title}}</h2>
                                <h6>
                                    {{ $book->ArrayToString($book->genres) }}
                                </h6>
                                <div class="rating-wrap my-3">
                                    <ul class="rating-stars">
                                        <li style="width:{{ $book->allBookRating($book->reviews) }}%" class="stars-active">
                                            <img src="{{ asset("img/stars-active.svg") }}" alt="">
                                        </li>
                                        <li>
                                            <img src="{{ asset("img/starts-disable.svg") }}" alt="">
                                        </li>
                                    </ul>
                                    <small class="label-rating text-muted">{{ $book->reviews->count() }} reviews</small>
                                </div>                   
                                <div class="mb-3">
                                    @if ($book->discount)
                                    <var class="price h4">{{ $book->discount_sum }} $</var>
                                    <span class="text-muted">{{ $book->price }} $</span>
                                @else
                                <var class="price h4">{{ $book->price}} $</var>
                                @endif 
                                </div>
                                <p>{{$book->description}}</p>
                            </article>
                        </main>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">  
            <div class="col-md-12">

                @forelse ($book->reviews as $review) 
                <article class="box mb-3">
                    <div class="icontext w-100">
                        @if($review->user->avatar)
                            <img src="{{ asset("storage/avatar/".$review->user->avatar) }}" class="img-xs icon rounded-circle">
                            @else
                            <img src="{{ asset("img/avatar.png") }}" class="img-xs icon rounded-circle">
                            @endif
                        <div class="text">
                            <span class="date text-muted float-md-right">
                                {{ $review->created_at->format('Y-m-d') }}
                            </span>  
                            <h6 class="mb-1">{{ $review->user->name}}</h6>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>
                            {{ $review->reviews }}
                        </p>	
                    </div>
                </article>  
                @empty 
                <article class="box mb-3">
                <p>No reviews</p> 
                </article>
                @endforelse
            </div>
        </div>      
    </div>
</section>

    @endsection