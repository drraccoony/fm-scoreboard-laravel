<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\activities;

class ActivitiesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->cannot('viewAny', Activities::class)) {
            return abort(403);
        }

        $activities = activities::query()
            ->get();

        return view('activities.index')
            ->with(compact('activities'));
    }

    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Activities::class)) {
            return abort(403);
        }

        return view('activities.create', $request)
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
        if ($request->user()->cannot('store', Activities::class)) {
            return abort(403);
        }
        
        $request->validate([
            'name' => ['required','string'],
            'points' => ['required','integer'],
            'type' => 'in:Panel,Mainstage,Cache,Special,Volunteer,Other',
        ]);
        // $activities = Activities::create($request->all());
        $post = new Activities;
        $post->name = $request->name;
        $post->description = $request->description;
        $post->points = $request->points;
        $post->type = $request->type;
        $post->guid = "120312";
        $post->save();
        return redirect('activities')
            ->with('notification', "Derp")
            ->with('status', 'Blog Post Form Data Has Been inserted');




        // $request->validate([
        //     'name' => ['required','string'],
        // ]);

        // $activities = Activities::create($request->all());
        // // event(new ShowCreated($show));
        // return redirect()
        //     ->route('activities');
        //     // ->with('notification', "Show $activities->name Created! Once approved by an administrator you can add episodes.");
    }

}
