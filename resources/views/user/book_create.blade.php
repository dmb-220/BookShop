@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">New book create</div>
                <div class="card-body">
                    <form action="{{ route('user.books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="title">Title</label>   
                            <div class="col-md-8">                
                            <input name="title" value="{{ old('title') }}" type="text" class="form-control" placeholder="Enter title book">                   
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                            </div>
                        </div>     
                
                        <div class="form-group row">                    
                            <label class="col-md-4 col-form-label text-md-right" for="author">Author</label>   
                            <div class="col-md-8">
                            <input name="author" value="{{ old('author') }}" type="text" class="form-control" placeholder="Enter author name">   
                            <small class="form-text text-muted">Authors are separated by commas</small>
                            @if ($errors->has('author'))
                                <span class="text-danger">{{ $errors->first('author') }}</span>
                            @endif  
                            </div>               
                        </div>     
                        <div class="form-group row"> 
                            <label class="col-md-4 col-form-label text-md-right" for="genre">Genre</label>  
                            <div class="col-md-8">
                                <div class="row">
                                    @forelse ($genres->split($genres->count()/3) as $row)
                                    <div class="col-md-4">
                                        @foreach($row as $genre)
                                        <label class="custom-control custom-checkbox">
                                            <input class="custom-control-input"  type="checkbox" name="genre[]" value="{{$genre->id}}">
                                            <div class="custom-control-label">{{$genre->name }}</div>
                                          </label>
                                        @endforeach
                                    </div>
                                    @empty  
                                    <option>No genres</option>    
                                    @endforelse
                                </div>
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
                            <label class="col-md-4 col-form-label text-md-right" for="cover">Price</label>  
                            <div class="col-md-8">  
                            <input name="price" type="text" value="{{ old('price') }}" class="form-control" placeholder="Enter price">                   
                            @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif   
                            </div>                 
                        </div>
                    
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="description">Description</label>
                            <div class="col-md-8">
                            <textarea name="description" class="form-control" placeholder="Enter description">{{ old('description') }}</textarea>
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
