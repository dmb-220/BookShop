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
                <aside class="col-md-2">
                    <a href="{{ asset("storage/".$book->cover) }}" class="img-wrap">
                        <img src="{{ asset("storage/".$book->cover) }}">
                    </a>
                </aside>
                <div class="col-md-8">
                    <div class="info-main">
                        @if ($book->is_new)
                                <span class="topbar">
                                    <div class="float-right alert alert-info"><b>NEW</b></div>
                                </span>
                                @endif
                                @if ($book->discount)
                                <span class="topbar">
                                    <div class="float-right alert alert-danger"><b>{{ $book->discount }} %</b></div>
                                </span>
                                @endif

                        {{ $book->AuthorsList($book->authors) }}
                        <div class="h5 title"> {{ $book->title }}</div>
                        {{ $book->GenreList($book->genres) }}
                        <hr>
                        {{ $book->strDescription }}
                    </div>
                </div>

                <aside class="col-sm-2">
                    <div class="info-aside">
                        <a href="{{ route('admin.books.show', $book->id) }}" class="btn btn-sm btn-info btn-block"> Details </a>
                        <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-sm btn-primary btn-block"> Edit </a>
                        <br>
                        @if(!$book->check)
                        <form action="{{ route('admin.books.update', $book->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-sm btn-success btn-block" onclick="return confirm('Verify book?');" type="submit">Confirm</button>
                        </form>
                        @endif
                        <br>
                        <form action="{{ route('admin.books.destroy', $book->id)}}" method="post">
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