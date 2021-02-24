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
                                    <a href="{{ asset("storage/".$book->cover) }}">
                                        <img src="{{ asset("storage/".$book->cover) }}"></a>
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
                                <hr>
                                @if (auth()->id())
                                <button type="button" class="btn  btn-danger" data-toggle="modal" data-target="#report"> Report book </button>
                                @endif
                                {{--<a href="#" class="btn  btn-primary"> Add Wish List </a>
                                <a href="#" class="btn  btn-outline-primary"> <span class="text">Add to cart</span> <i class="fas fa-shopping-cart"></i>  </a>--}}
                            </article>
                        </main>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="Report Book" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Report book</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    @auth
                    @if(!$book->report)
                    <form action="{{ route('user.reports.store') }}" method="POST">
                        @csrf
                    <div class="form-group">
                        <textarea name="report" class="form-control" rows="3"></textarea>
                        <small class="form-text text-muted"> Maximum character is 250 letters </small>
                        @if ($errors->has('report'))
                            <span class="text-danger">{{ $errors->first('report') }}</span>
                        @endif
                        <input type="hidden" name="book_id" value="{{ $book->id }}" />
                    </div>
                    <button type="submit" class="btn btn-sm btn-success btn-block"> Report </button>
                    </form>
                    @else
                    You have submitted an inappropriate book report
                    <div class="alert alert-success">
                        <p>{{ $book->report->report }}</p>
                    </div>
                    @if ($book->report->ansver)
                    Admin ansver:
                    <div class="alert alert-info">
                        <p>{{ $book->report->ansver }}</p>
                    </div>
                    @else
                    Waiting admin ansver!
                    @endif
                    
                    @endif
                    @endauth
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        <hr>
        <div class="row">  
            <div class="col-md-12">
                @if (auth()->id())
                <article class="box mb-3">
                <form action="{{ route('user.reviews.store') }}" method="POST">
                    @csrf
                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right">Book review</label>
                    <div class="col-md-10"> 
                    <textarea name="reviews" class="form-control" rows="3"></textarea>
                    @if ($errors->has('reviews'))
                    <span class="text-danger">{{ $errors->first('reviews') }}</span>
                    @endif
                    </div>
                </div>

                <input type="hidden" name="book_id" value="{{ $book->id }}" />
                
                <div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right">Rating</label>
                    <div class="col-sm-9 pt-1">

                        <example-component />
                        <br>
                        @if ($errors->has('rating'))
                            <span class="text-danger">{{ $errors->first('rating') }}</span>
                        @endif
                    </div>
                  </div>
                  

                <hr>
                <div class="form-group row mb-0">
                    <div class="col-md-10 offset-md-2">
                        <button type="submit" class="btn btn-sm btn-success btn-block"> Write review </button>
                    </div>
                </div>
                </form>
                </article>
                @endif

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
                            <ul class="rating-stars">
                                <li style="width:{{ $review->viewRating($review->rating) }}%" class="stars-active">
                                    <img src="{{ asset("img/stars-active.svg") }}" alt="">
                                </li>
                                <li>
                                    <img src="{{ asset("img/starts-disable.svg") }}" alt="">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>
                            {{ $review->reviews }}
                        </p>	
                    </div>
                    
                    @if ($review->user->id == Auth::id())
                    <hr>
                    <form action="{{ route('user.reviews.destroy', $review->id)}}" method="post">
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