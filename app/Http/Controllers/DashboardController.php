<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activities;
use App\Models\LoggedActivities;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $myfeed = LoggedActivities::forUser($request->user())
            ->latest()
            ->limit(5)
            ->get();

        return view('dashboard')
            ->with(compact('myfeed'));
    }
}
