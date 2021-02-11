@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
    <div class="container-fluid pl-5 px-5"> 
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    </div>
    @endif

    {{$book}}

    @endsection