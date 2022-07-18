<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\activities;

class ActivitiesController extends Controller
{
    public function index(Request $request)
    {
        $activities = activities::query()
            ->get();

        return view('activities.index')
            ->with(compact('activities'));
    }

    public function create(Request $request)
    {

        return view('activities.create')
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
            'points' => ['required','integer'],
            'type' => ['required','string'],
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
