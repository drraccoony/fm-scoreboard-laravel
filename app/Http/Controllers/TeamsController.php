<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeamsController extends Controller
{
    public function index(Request $request)
    {
        $teams = DB::table('teams')
        ->leftJoin('logged_activities', 'teams.id', '=', 'logged_activities.team_id')
        ->leftJoin('activities', 'activities.id', '=', 'logged_activities.activity_id')
        ->selectRaw('teams.id, teams.name, teams.color, sum(activities.points) as points')
        ->groupBy('teams.id')
        ->orderBy('points', 'desc')
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
        $post->owner_id = Auth::user()->id;
        $post->save();
        return redirect('teams');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('teams.edit')
            ->with(compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => ['required','string'],
        ]);

        $team->update($request->all());

        return redirect()
            ->route('teams');
    }
}
