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
                        @if($report->user->avatar)
                            <img src="{{ asset("storage/avatar/".$report->user->avatar) }}" class="img-xs icon rounded-circle">
                            @else
                            <img src="{{ asset("img/avatar.png") }}" class="img-xs icon rounded-circle">
                            @endif
                        <div class="text">
                            <span class="date text-muted float-md-right">
                                {{ $report->created_at->format('Y-m-d') }}
                            </span>  
                            <h6 class="mb-1">{{ $report->user->name}}</h6>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>
                            {{ $report->report }}
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
                        <form action="{{ route('user.reports.destroy', $report->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete report?');" type="submit">Delete</button>
                        </form>
                        </div>
                    </div>
                </article>  
                @if ($report->ansver)
                <hr>
                Ansver:
                <div class="alert alert-info">
                    <p>{{ $report->ansver }}</p>
                </div>
                @endif            
            </div>
        </div>      
    </div>
</section>

    @endsection