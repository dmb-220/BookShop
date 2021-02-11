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
                                @foreach($book->authors as $author)
                                {{ $author->name }}{{ $loop->last ? '' : ','}}
                                @endforeach
                                <h2 class="title">{{$book->title}}</h2>
                                <h6>
                                    @foreach($book->genres as $genre)
                                    {{ $genre->genre }}{{ $loop->last ? '' : ','}}
                                    @endforeach
                                </h6>
                                <div class="rating-wrap my-3">
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
                                    <small class="label-rating text-muted">132 reviews</small>
                                </div>                   
                                <div class="mb-3">
                                    <var class="price h4">$8.15</var>
                                    <span class="text-muted">$18.15</span>
                                </div>
                                <p>{{$book->description}}</p>
                                <hr>
                                <a href="#" class="btn  btn-primary"> Add Wish List </a>
                                <a href="#" class="btn  btn-outline-primary"> <span class="text">Add to cart</span> <i class="fas fa-shopping-cart"></i>  </a>
                            </article>
                        </main>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">  
            <div class="col-md-12">
                <article class="box mb-3">
                <form action="{{ route('review.store') }}" method="POST">
                    @csrf
                <div class="form-group">
                    <label>Book review</label>
                    <textarea name="reviews" class="form-control" rows="3"></textarea>
                    <small class="form-text text-muted"> Maximum character is 250 letters </small>
                    @if ($errors->has('reviews'))
                        <span class="text-danger">{{ $errors->first('reviews') }}</span>
                    @endif
                    <input type="hidden" name="book_id" value="{{ $book->id }}" />
                </div>
                <button type="submit" class="btn btn-sm btn-success btn-block"> Write review </button>
                </form>
                </article>

                @forelse ($book->reviews as $review) 
                <article class="box mb-3">
                    <div class="icontext w-100">
                        <img src="{{ asset("img/avatar.png") }}" class="img-xs icon rounded-circle">
                        <div class="text">
                            <span class="date text-muted float-md-right">
                                {{ \Carbon\Carbon::parse($review->created_at)->format('Y-m-d') }}
                            </span>  
                            <h6 class="mb-1">{{ $review->user->name}}</h6>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>
                            {{ $review->reviews }}
                        </p>	
                    </div>
                    
                    @if ($review->user->id == Auth::id())
                    <hr>
                    <form action="{{ route('review.destroy', $review->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="book_id" value="{{ $book->id }}" />
                        {{--<a href="{{ route('review.edit', $review->id)}}" class="btn btn-info btn-sm">Edit</a>--}}
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                    @endif
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