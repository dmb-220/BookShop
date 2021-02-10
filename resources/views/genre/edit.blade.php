@extends('layouts.admin_app')

@section('content')
<div class="card">
    <header  class="card-header text-left">
        Edit genre
    </header >
    <div class="card-body">
        <form action="{{ route('genre.update', $genre->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Genre name:</label>                   
                <input name="genre" value="{{ $genre->genre }}" type="text" class="form-control" placeholder="Enter genre name">                   
                @if ($errors->has('genre'))
                    <span class="text-danger">{{ $errors->first('genre') }}</span>
                @endif

            </div>        
            <button type="submit" class="btn btn-primary">Save Genre</button>
        </form>
    </div>
</div>
@endsection  