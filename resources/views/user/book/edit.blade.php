@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book edit</div>
                <div class="card-body">
                    <form action="{{ route('user.books.update', $book->id) }}" method="POST"   enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="title">Title</label>   
                            <div class="col-md-8">                
                            <input name="title" value="{{$book->title}}" type="text" class="form-control" placeholder="Enter title book">                   
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                            </div>
                        </div>     

                        <div class="form-group row">                    
                            <label class="col-md-4 col-form-label text-md-right" for="author">Author</label>   
                            <div class="col-md-8">
                            <input name="author" value="{{ $book->AuthorsList($book->authors) }}" 
                                type="text" class="form-control" placeholder="Enter author name">   
                            <small class="form-text text-muted">Authors are separated by commas</small>
                            @if ($errors->has('author'))
                                <span class="text-danger">{{ $errors->first('author') }}</span>
                            @endif  
                            </div>               
                        </div>     
                        <div class="form-group row"> 
                            <label class="col-md-4 col-form-label text-md-right" for="genre">Genre</label>  
                            <div class="col-md-8">                           
                                    @forelse ($genres as $genre)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="genre[]" {{ $book->checkGenres($genre->id, $book->genres) }} value="{{$genre->id}}">
                                            <label class="form-check-label">{{$genre->genre }}</label>
                                        </div>
                                    @empty  
                                    <option>No genres</option>    
                                    @endforelse
                                @if ($errors->has('genre'))
                                <span class="text-danger">{{ $errors->first('genre') }}</span>
                                @endif     
                            </div>
                        </div>       
                        <div class="img-wrap padding-bottom-sm" style="padding-left: 40px">
                            <img class="img-lg" src="{{ asset("storage/".$book->cover) }}">
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
                            <input name="price" value="{{$book->price}}" type="text" class="form-control" placeholder="Enter price">                   
                            @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif   
                            </div>                 
                        </div>
                    
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="description">Description</label>
                            <div class="col-md-8">
                            <textarea name="description" class="form-control" placeholder="Enter description">
                                {{$book->description}}
                            </textarea>
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
