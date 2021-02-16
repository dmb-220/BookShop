<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index')
        ->with('users', User::with('role', 'books', 'reports', 'reviews')
            ->orderBy('role_id')
            ->paginate(10));
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
     * @param  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        return view('admin.edit')
            ->with('user', User::where('id', $id)
            ->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find(auth()->user()->id)->delete();

        return redirect()->route('admin.admin.index')
            ->with('success','User deleted successfully.');
    }
}
