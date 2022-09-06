<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->cannot('viewAny', User::class)) {
            return abort(403);
        }

        $users = User::query()
            ->get();

        return view('users.index')
            ->with(compact('users'));
    }

    // public function edit(Request $request)
    // {
    //     $user = $request->user();
    //     $teams = Team::query()
    //         ->get();
        
    //     return view('users.edit')
    //         ->with(compact('user','teams'));
    // }

    public function editUser(Request $request, User $user)
    {
        if ($request->user()->cannot('update', $user)) {
            return redirect()->route('user.edit');
        }
        $teams = Team::query()
            ->get();

        return view('users.edit')
            ->with(compact('user','teams'));
    }

    public function confirm(Request $request, User $user)
    {
        if (
            ($request->user()->id === $user->id)
            || $request->user()->cannot('delete', $user)
        ) {
            return redirect()->route('users');
        }

        return view('users.confirm')
            ->with(compact('user'));
    }

    public function delete(Request $request, User $user)
    {
        // Admins can't delete their own account
        if (
            !($request->user()->id === $user->id)
            && $request->user()->can('delete', User::class)
        ) {
            $user->delete();
        }

        return redirect()->route('users');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required','string'],
        ]);

        $user->update($request->all());

        return redirect()
            ->route('users');
    }
}
