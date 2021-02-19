<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Review;
use App\Models\Report;
use App\Models\Book;
use Illuminate\Http\Request;

class UserControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index')
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
        return view('admin.user.edit')
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
        Review::where('user_id', $id)->delete();
        Report::where('user_id', $id)->delete();
        Book::where('user_id', $id)->delete();

        User::where('id', $id)
            ->delete();

        return redirect()->route('admin.user.index')
            ->with('success','User deleted successfully.');
    }
}
