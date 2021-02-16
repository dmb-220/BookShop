@extends('layouts.admin_app')

@section('content')
<div class="card">
    <header  class="card-header text-left">
        Users control
    </header >
    <div class="card-body">
        {{ $user }}
    </div>
</div>
@endsection  