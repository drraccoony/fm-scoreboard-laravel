<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class TeamsController extends Controller
{
    public function index(Request $request)
    {


        try {
        $teams = DB::table('teams')
        ->leftJoin('logged_activities', 'teams.id', '=', 'logged_activities.team_id')
        ->leftJoin('activities', 'activities.id', '=', 'logged_activities.activity_id')
        ->selectRaw('teams.id, teams.name, teams.color, sum(activities.points) as points')
        ->groupBy('teams.id')
        ->orderBy('points', 'desc')
        ->get();
        } catch (Throwable $e) {
            Log::error("Error getting Teams data: ".$e->getMessage(), $e->getTrace());
            $teams = new Collection();
        }

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function join(Team $team)
    {
        
        $user = Auth::user();
        $user->team_id = $team->id;
        $user->save();
        
        return redirect('/teams');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function null_team()
    {
        
        $user = Auth::user();
        $user->team_id = null;
        $user->save();
        
        return redirect('/teams');
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
