<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\activities;
use App\Models\team;

class TeamsController extends Controller
{
    public function index(Request $request)
    {
        $teams = team::query()
            ->get();

        return view('teams.index')
            ->with(compact('teams'));
    }

    public function create(Request $request)
    {

        return view('teams.create', $request)
            ->with(compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required','string'],
        ]);
        $post = new Team;
        $post->name = $request->name;
        $post->locked = $request->locked;
        $post->color = $request->color;
        $post->save();
        return redirect('teams');

    }

}
