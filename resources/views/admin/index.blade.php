@extends('layouts.admin_app')

@section('content')
<div class="card">
    <header  class="card-header text-left">
        Users control
    </header>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">User name</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Role</th>
                            <th scope="col">Books</th>
                            <th scope="col">Reviews</th>
                            <th scope="col">Reports</th>
                            <th scope="col">Birthday</th>
                            <th scope="col">Create account</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)  
                    <tr @if($user->role->name == 'Admin') class="table-info" @endif>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>{{ $user->books->count() }}</td>
                        <td>{{ $user->reviews->count() }}</td>
                        <td>{{ $user->reports->count() }}</td>
                        <td>{{ $user->birthday  }}</td>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        <td class="text-right">
                            <form action="{{ route('admin.admin.destroy', $user->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                {{-- <a href="{{ route('admin.admin.edit', $user->id) }}" class="btn btn-sm btn-primary"> Edit </a> --}}
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete user account?');" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>      
                    @endforeach
                </tbody>
            </table>
            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
            </div>
        </div>
    </div>
</div>
@endsection  