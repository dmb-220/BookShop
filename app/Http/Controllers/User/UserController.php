<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $user = User::where('id', auth()->id())
            ->with('role')
            ->first();

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $request->validate([
            'user_name' => 'required|min:3',
            'email' => 'required|email',
            'birthday' => 'required',
        ]);

        $imageName = "";

        if($request->avatar){
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:512'
            ]);
        
            $imageName = time().'.'.$request->avatar->extension();  
            $request->avatar->storeAs('public/avatar', $imageName);
        }

        auth()->user()->update([
            'name' => $request->user_name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'avatar' => $imageName
            ]);

            return redirect()->route('user.user.index')
            ->with('success','Account info change successfully.');
    }
    
    public function password_update(Request $request, $user)
    {
        $request->validate([
            'old-password' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'password-confirm' => ['same:password'],
        ]);

       auth()->user()->update(['password'=> Hash::make($request->password)]);

        return redirect()->route('user.user.index')
        ->with('success','Password change successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        //
    }
}
