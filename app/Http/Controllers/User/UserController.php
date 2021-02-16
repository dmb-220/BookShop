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

        return view('user.index')
        ->with('user', User::where('id', auth()->user()->id)
            ->with('role')
            ->first());
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
        //
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
        if($request->_method == 'PUT'){
            //Atliekam validacija
            $request->validate([
                'old-password' => ['required', new MatchOldPassword],
                'password' => ['required'],
                'password-confirm' => ['same:password'],
            ]);
    
            User::auth()->user()->update(['password'=> Hash::make($request->password)]);

            //gristam i pradini puslapi
            //siunciam pranesima kad irasymas atliktas
            return redirect()->route('user.user.index')
            ->with('success','Password change successfully.');
        }

        if($request->_method == 'PATCH'){
            //Atliekam validacija
            $request->validate([
                'user_name' => 'required|min:3',
                'email' => 'required|email',
                'birthday' => 'required',
            ]);

            $imageName = "";

            if($request->avatar){
                //JEI NAUJAI IKELIAMAS cover
                $request->validate([
                    'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:512'
                ]);
                //reiketu padaryti seno istrynima

                //ikeliam cover nuotrauka
                $imageName = time().'.'.$request->avatar->extension();  
                $request->avatar->storeAs('public/avatar', $imageName);
            }
    
            User::find(auth()->user()->id)->update([
                'name' => $request->user_name,
                'email' => $request->email,
                'birthday' => $request->birthday,
                'avatar' => $imageName
                ]);

            //gristam i pradini puslapi
            //siunciam pranesima kad irasymas atliktas
            return redirect()->route('user.user.index')
            ->with('success','Account info change successfully.');
        }
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
