@extends('layouts.admin_app')

@section('content')
<div class="card">
    <header  class="card-header text-left">
        Create genre
    </header >
    <div class="card-body">
        <form action="{{ route('genre.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Genre name:</label>                   
                <input name="genre" type="text" class="form-control" placeholder="Enter genre name">                   
                @if ($errors->has('genre'))
                    <span class="text-danger">{{ $errors->first('genre') }}</span>
                @endif

            </div>        
            <button type="submit" class="btn btn-primary">Save Genre</button>
        </form>
    </div>
</div>
@endsection  