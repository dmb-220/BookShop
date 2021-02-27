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
                <reviews-ratings :user-id="{{ auth()->id()  ?? 0 }}" :book-id="{{ $book->id }}">
            </div>
        </div>      
    </div>
</section>

    @endsection