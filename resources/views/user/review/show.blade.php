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
                    <hr>
                    <div class="row"> 
                        {{--<div class="col-md-1">
                        <form action="{{ route('admin.reviews.update', $review->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-sm btn-success" onclick="return confirm('Verify book?');" type="submit">Confirm</button>
                        </form>
                        </div>--}}
                        <div class="col-md-1">
                        <form action="{{ route('admin.reviews.destroy', $review->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete reviews?');" type="submit">Delete</button>
                        </form>
                        </div>
                    </div>
                </article>  
            </div>
        </div>      
    </div>
</section>

    @endsection