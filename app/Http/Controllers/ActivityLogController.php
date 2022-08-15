<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\LoggedActivities;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ActivityLogController extends Controller
{
    public function viewLog(Request $request)
    {
        $activities = LoggedActivities::forUser($request->user())
            ->get();

        return view('logbook.index')
            ->with(compact('activities'));
    }

    public function viewUserLog(Request $request, User $user)
    {
        if ($request->user()->cannot('viewUserLog', $user)) {
            return redirect()->route('log');
        }

        $activities = LoggedActivities::forUser($user)
            ->get();

        return view('logbook.index')
            ->with(compact('activities'));
    }

    /**
     * This function handles the business logic to check if the user has logged this activity already
     * and will insert a LoggedActivity if the activity hasn't been logged for the user. The
     * appropriate response show in the view is provided to give feedback.
     *
     * @param Activities $activity The activity the user is wanting to log points for
     * @return void Returns the logbook.log-activity view
     */
    public function logActivity(Activities $activity)
    {
        $team = Auth::user()->team;
        $teamName = $team ? $team->name : "Team not found";
        $activityName = $activity ? $activity->name : "Activity not found";

        if ($team === null || $activity === null) {
            $canLogActivity = false;
            $statusReason = "Couldn't find activity and/or team";
            Log::error("Failed to log activity -> Team: '$teamName' Activity: '$activityName'");
        } else {
            $foundLoggedActivity = LoggedActivities::where('user_id', Auth::id())
                ->where('activity_id', $activity->id)
                ->first();

            $canLogActivity = $foundLoggedActivity ? false : true;
            $statusReason = $canLogActivity ? "Logged activity" : "Already logged activity participation";

            if ($canLogActivity) {
                $logActivity = new LoggedActivities();
                $logActivity->user_id = Auth::id();
                $logActivity->team_id = $team->id;
                $logActivity->activity_id = $activity->id;
                $logActivity->save();

                Log::debug("Logged activity for -> Team: $team->id Activity: $activity->id User: " . Auth::id());
            } else {
                Log::debug("Activity already logged for -> Team: $team->id Activity: $activity->id User: " . Auth::id());
            }
        }

        return view('logbook.log-activity')
            ->with(compact('canLogActivity', 'statusReason', 'teamName', 'activityName'));
    }
}
