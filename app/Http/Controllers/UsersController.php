<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $user = user::query()
            ->get();

        return view('users.index')
            ->with(compact('user'));
    }
    
    public function edit(user $id)
    {
        $user = user::find($id)
            ->first();
            
        return view('users.edit')
            ->with(compact('user'));
    }
    
    public function confirm(user $id)
    {
        $user = user::find($id)
            ->first();

        return view('users.confirm')
            ->with(compact('user'));
    }

    public function delete(user $id)
    {
        user::find($id)
            ->first()
            ->delete();

        $user = user::query()
            ->get();

        return view('users.index')
            ->with(compact('user'));
    }

}