@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New book create</div>
                <div class="card-body">
                    <form action="{{ route('shop.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="title">Title</label>   
                            <div class="col-md-8">                
                            <input name="title" type="text" class="form-control" placeholder="Enter title book">                   
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                            </div>
                        </div>     
                
                        <div class="form-group row">                    
                            <label class="col-md-4 col-form-label text-md-right" for="author">Author</label>   
                            <div class="col-md-8">
                            <input name="author" type="text" class="form-control" placeholder="Enter author name">   
                            <small class="form-text text-muted">Authors are separated by commas</small>
                            @if ($errors->has('author'))
                                <span class="text-danger">{{ $errors->first('author') }}</span>
                            @endif  
                            </div>               
                        </div>     
                        
                        <div class="form-group row"> 
                            <label class="col-md-4 col-form-label text-md-right" for="genre">Genre</label>  
                            <div class="col-md-8">
                                <select name='genre[]' class="custom-select form-control" multiple>
                                    @forelse ($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                                    @empty  
                                    <option>No genres</option>    
                                    @endforelse
                                </select>
                                <small class="form-text text-muted">You can choose from several genres</small>
                                @if ($errors->has('genre'))
                                <span class="text-danger">{{ $errors->first('genre') }}</span>
                                @endif     
                            </div>
                        </div>               
                        <div class="form-group row">                    
                            <label class="col-md-4 col-form-label text-md-right" for="cover">Cover</label>  
                            <div class="col-md-8">  
                            <input name="cover" type="file" class="form-control" placeholder="Select cover">                   
                            @if ($errors->has('cover'))
                                <span class="text-danger">{{ $errors->first('cover') }}</span>
                            @endif   
                            </div>                 
                        </div>   
                    
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="description">Description</label>
                            <div class="col-md-8">
                            <textarea name="description" class="form-control" placeholder="Enter description"></textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Save Book</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
