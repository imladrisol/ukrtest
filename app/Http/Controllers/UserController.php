<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $users_trashed = User::onlyTrashed()->get();
        return view('users.index')
            ->with('users', $users)
            ->with('title', 'Users')
            ->with('users_trashed', $users_trashed);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request::all();
        User::create($input);
        return Redirect::to('user.index')->with('message', 'User has created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request::all();
        $user = User::findOrFail($id);
        if($user){
            $user->update($input);
        }
        return Redirect::to('users.show')->with('message', 'User info changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('user')->with('message', 'User '.$user->username.' was soft deleted');
    }

    public function restore($id){
        $user = User::withTrashed()->find($id);
        //dd($user->username);

        $user->restore();
       // dd($user->username);
        return redirect('user')->with('message', 'Restore user '.$user->username.' successful.');
    }
    public function delTrash($id){
        $user = User::find($id);
        $user->forceDelete();
        return redirect('user')->with('message', 'User '.$user->username.' was deleted successfully.');
    }
}
