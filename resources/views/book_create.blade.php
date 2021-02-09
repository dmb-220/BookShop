@extends('layouts.app')

@section('content')
<div class="container-fluid pl-5 px-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New book create</div>
                <div class="card-body">
                    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>                   
                            <input name="title" type="text" class="form-control" placeholder="Enter title book">                   
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
           
                        </div>     
                
                        <div class="form-group">                    
                            <label for="author">Author</label>                   
                            <input name="author" type="text" class="form-control" placeholder="Enter author name">                   
                            @if ($errors->has('author'))
                                <span class="text-danger">{{ $errors->first('author') }}</span>
                            @endif                 
                        </div>     
                        
                        <div class="form-group">                    
                            <label for="genre">Genre</label>                   
                            <input name="genre" type="text" class="form-control" placeholder="Enter name">                   
                            @if ($errors->has('genre'))
                                <span class="text-danger">{{ $errors->first('genre') }}</span>
                            @endif                    
                        </div>   
                
                        <div class="form-group">                    
                            <label for="cover">Cover</label>                   
                            <input name="cover" type="file" class="form-control" placeholder="Select cover">                   
                            @if ($errors->has('cover'))
                                <span class="text-danger">{{ $errors->first('cover') }}</span>
                            @endif                    
                        </div>   
                    
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" placeholder="Enter description"></textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Save Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
