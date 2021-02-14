@extends('layouts.admin_app')

@section('content')
@if ($message = Session::get('success'))
    <div class="container-fluid"> 
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    </div>
@endif


<div class="card">
    <header  class="card-header">
        Book list
    </header>
    <div class="card-body">
        @forelse ($books as $book)
        <article class="card card-product-list">
            <div class="row no-gutters">
                <aside class="col-md-3">
                    <a href="{{ asset("storage/".$book->cover) }}" class="img-wrap">
                        @if ($book->created_at_difference() <= 7)
                            <span class="badge badge-danger"> NEW </span>
                        @endif
                        <img src="{{ asset("storage/".$book->cover) }}">
                    </a>
                </aside>
                <div class="col-md-6">
                    <div class="info-main">
                        {{ $book->getAuthorsList($book->authors) }}
                        <div class="h5 title"> {{ $book->title }}</div>
                        @foreach($book->genres as $genre)
                        {{ $genre->genre }}{{ $loop->last ? '' : ','}}
                        @endforeach
                        <hr>
                        {!! \Illuminate\Support\Str::words($book->description, 30,' ...')  !!}
                    </div>
                </div>

                <aside class="col-sm-3">
                    <div class="info-aside">
                        <a href="{{ route('user.books.show', $book->id) }}" class="btn btn-sm btn-info btn-block"> Details </a>
                        <a href="{{ route('user.books.edit', $book->id) }}" class="btn btn-sm btn-primary btn-block"> Edit </a>
                        <br>
                        <form action="{{ route('user.books.destroy', $book->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger btn-block" onclick="return confirm('Delete book?');" type="submit">Delete</button>
                        </form>

                    </div>
                </aside>

            </div>
        </article>  
    @empty       
    <p>No Book</p> 
    @endforelse
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $books->links() !!}
    </div>
    </div>
</div>

@endsection 