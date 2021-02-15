@extends('layouts.admin_app')

@section('content')
@if ($message = Session::get('success'))
    <div class="container-fluid"> 
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    </div>
@endif
{{--Discount--}}
@if ($errors->has('discount'))
<div class="alert alert-danger">
    {{ $errors->first('discount') }}
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
                        @if ($book->is_new)
                            <span class="badge badge-danger"> NEW </span>
                        @endif
                        <img src="{{ asset("storage/".$book->cover) }}">
                    </a>
                </aside>
                <div class="col-md-6">
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
                        <hr>

                        <form action="{{ route('user.books.update', $book->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="input-group w-100">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-percent"></i> </span>
                                 </div>
                                <input type="text" name="discount" value="{{ $book->discount }}" class="form-control" style="width:55%;" placeholder="Enter discount 10 - 90 %">
                                <div class="input-group-append">
                                  <button class="btn btn-primary" type="submit">
                                    Discount
                                  </button>
                                </div> 
                            </div>
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
        {{ $books->links() }}
    </div>
    </div>

</div>

@endsection 