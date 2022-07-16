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

}
