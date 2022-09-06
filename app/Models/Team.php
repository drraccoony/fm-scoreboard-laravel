<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Models\User;
use App\Models\Activities;
use App\Models\LoggedActivities;

class Team extends Model
{
    use HasFactory;

    /**
     * Create the owner relationship lookup
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function player_count($id)
    {
        return User::where('team_id', '=', $id)->get()->count();
    }

    public function total_score($id)
    {
        return 'Unknown';
        // $number = LoggedActivities::where('team_id', '=', $id)->get();
        // return $number->count();
    }

}
