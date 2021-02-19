@extends('layouts.user_app')

@section('content')
@if ($message = Session::get('success'))
<div class="container-fluid pl-5 px-5"> 
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
</div>
@endif

<div class="card">
    <header  class="card-header text-left">
        User profile
    </header >
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <form action="{{ route('user.password_update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">                    
                        <label class="col-md-4 col-form-label text-md-right" for="cover">Old Password</label>  
                        <div class="col-md-8">  
                        <input name="old-password" type="password" class="form-control" placeholder="Enter old password">                   
                        @if ($errors->has('old-password'))
                            <span class="text-danger">{{ $errors->first('old-password') }}</span>
                        @endif   
                        </div>                 
                    </div>
                    <div class="form-group row">                    
                        <label class="col-md-4 col-form-label text-md-right" for="cover">Password</label>  
                        <div class="col-md-8">  
                        <input name="password" type="password" class="form-control" placeholder="Enter password">                   
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif   
                        </div>                 
                    </div>
                    <div class="form-group row">                    
                        <label class="col-md-4 col-form-label text-md-right" for="cover">Password confirm</label>  
                        <div class="col-md-8">  
                        <input name="password-confirm" type="password" class="form-control" placeholder="Enter password confirm">                   
                        @if ($errors->has('password-confirm'))
                            <span class="text-danger">{{ $errors->first('password-confirm') }}</span>
                        @endif   
                        </div>                 
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Save Password</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <form action="{{ route('user.user.update', $user) }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right" for="title">User name</label>   
                        <div class="col-md-10">                
                        <input name="user_name" value="{{ $user->name }}" type="text" class="form-control" placeholder="Enter User name">                   
                        @if ($errors->has('user_name'))
                            <span class="text-danger">{{ $errors->first('user_name') }}</span>
                        @endif
                        </div>
                    </div> 
                    
                    <div class="form-group row">                    
                        <label class="col-md-2 col-form-label text-md-right" for="cover">E-mail</label>  
                        <div class="col-md-10">  
                        <input name="email" type="text" value="{{ $user->email }}" class="form-control" placeholder="Enter e-mail">                   
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif   
                        </div>                 
                    </div>
                    
                    <div class="form-group row">                    
                        <label class="col-md-2 col-form-label text-md-right" for="author">Birthday</label>   
                        <div class="col-md-10">
                        <input name="birthday" value="{{ $user->birthday }}" type="date" class="form-control" placeholder="">   
                        @if ($errors->has('birthday'))
                            <span class="text-danger">{{ $errors->first('birthday') }}</span>
                        @endif  
                        </div>               
                    </div>    
                    <div class="col-md-10 offset-md-2">
                        <div class="img-wrap padding-bottom-sm text-md-left">
                            @if($user->avatar)
                            <img src="{{ asset("storage/avatar/".$user->avatar) }}" class="img-xs icon rounded-circle">
                            @else
                            <img src="{{ asset("img/avatar.png") }}" class="img-xs icon rounded-circle">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <label class="col-md-2 col-form-label text-md-right" for="cover">Avatar</label>  
                        <div class="col-md-10">  
                        <input name="avatar" type="file" class="form-control" placeholder="Select avatar">                   
                        @if ($errors->has('avatar'))
                            <span class="text-danger">{{ $errors->first('avatar') }}</span>
                        @endif   
                        </div>                 
                    </div> 
            
                    <div class="form-group row mb-0">
                        <div class="col-md-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Save Account</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection  