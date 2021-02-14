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
        Reviews
    </header >
    <div class="card-body">
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Review</th>
            <th scope="col">Book</th>
            <th scope="col">Create review</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    @forelse ($reviews as $review)
    <tr>
        <td><a href="{{ route('user.reviews.show', $review->id) }}">{{ $review->str_review}}</a></td>
        <td><a href="{{ route('user.books.show', $review->book->id) }}">{{ $review->book->title }}</a></td>
        <td>{{ \Carbon\Carbon::parse($review->created_at)->format('Y-m-d') }}</td>
        <td class="text-right">
            {{-- @if(!$review->aproved)
               <form action="{{ route('admin.reviews.update', $review->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-sm btn-success" onclick="return confirm('Verify book?');" type="submit">Confirm</button>
                </form>
                @endif
                <br>
                <form action="{{ route('admin.reviews.destroy', $review->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete book?');" type="submit">Delete</button>
                </form>--}}
        </td>
    </tr>                 
@empty       
<p>No genres</p> 
@endforelse
    </tbody>
</table>
{{-- Pagination --}}
<div class="d-flex justify-content-center">
    {!! $reviews->links() !!}
</div>
</div>
</div>
@endsection  