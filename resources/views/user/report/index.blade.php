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
        Report
    </header >
    <div class="card-body">
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Report</th>
            <th scope="col">Book</th>
            <th scope="col">Create report</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    @forelse ($reports as $report)
    <tr>
        <td><a href="{{ route('user.reports.show', $report->id) }}">{{ $report->str_report}}</a></td>
        <td><a href="{{ route('user.books.show', $report->book->id) }}">{{ $report->book->title }}</a></td>
        <td>{{ \Carbon\Carbon::parse($report->created_at)->format('Y-m-d') }}</td>
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
    {!! $reports->links() !!}
</div>
</div>
</div>
@endsection  