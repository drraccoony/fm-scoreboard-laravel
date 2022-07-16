<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\logged_activities;

class ActivityLogController extends Controller
{
    public function mine(Request $request)
    {
        $activities = logged_activities::forUser(Auth::user())
            ->get();

        // $activities = logged_activities::query()
        //     ->get();

        return view('logbook.mine')
            ->with(compact('activities'));
    }
}
