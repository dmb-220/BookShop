@extends('layouts.admin_app')

@section('content')
<div class="card">
    <header  class="card-header text-left">
        Edit Author
    </header >
    <div class="card-body">
        <form action="{{ route('admin.authors.update', $author->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="title">Author name:</label>  
                <div class="col-md-8">
                <input name="author" value="{{ $author->name }}" type="text" class="form-control" placeholder="Enter author name">                   
                @if ($errors->has('author'))
                    <span class="text-danger">{{ $errors->first('author') }}</span>
                @endif
                </div>
            </div>  <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">Save Author</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection  