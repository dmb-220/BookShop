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
        Authors
    </header >
    <div class="card-body">
<table class="table table-striped">
    <thead>
        <tr>
          <th scope="col">Author</th>
          <th scope="col">Book</th>
          <th scope="col">Last modified</th>
          <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    @forelse ($authors as $author)
    <tr>
        <td>{{ $author->name }}</td>
        <td>{{ $author->books->count() }}</td>
        <td>{{ $author->created_at->format('Y-m-d') }}</td>
        <td class="text-right">
            <form action="{{ route('admin.authors.destroy', $author->id)}}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{ route('admin.authors.edit', $author->id)}}" class="btn btn-info btn-sm">Edit</a>
                @if(!$author->books->count())
                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete Author?');" type="submit">Delete</button>
                @endif
            </form>
        </td>
    </tr>                 
@empty       
<p>No genres</p> 
@endforelse
    </tbody>
</table>
{{-- Pagination --}}
<div class="d-flex justify-content-center">
    {!! $authors->links() !!}
</div>
</div>
</div>
@endsection  