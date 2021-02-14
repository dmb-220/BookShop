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
                        <img src="{{ asset("img/avatar.png") }}" class="img-xs icon rounded-circle">
                        <div class="text">
                            <span class="date text-muted float-md-right">
                                {{ \Carbon\Carbon::parse($report->created_at)->format('Y-m-d') }}
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
                        <form action="{{ route('admin.reports.destroy', $report->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete report?');" type="submit">Delete</button>
                        </form>
                        </div>
                    </div>
                </article>  
                <hr>
                <article class="box mb-3">
                    <form action="{{ route('admin.reports.store') }}" method="POST">
                        @csrf
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right">Ansver reports</label>
                        <div class="col-md-10"> 
                        <textarea name="report" class="form-control" rows="3"></textarea>
                        @if ($errors->has('report'))
                        <span class="text-danger">{{ $errors->first('report') }}</span>
                        @endif
                        </div>
                    </div>   
                    <input type="hidden" name="report_id" value="{{ $report->id }}" />
     
                    <div class="form-group row mb-0">
                        <div class="col-md-10 offset-md-2">
                            <button type="submit" class="btn btn-sm btn-success btn-block"> Ansver </button>
                        </div>
                    </div>
                    </form>
                    </article>
            </div>
        </div>      
    </div>
</section>

    @endsection