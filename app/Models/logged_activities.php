<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logged_activities extends Model
{
    use HasFactory;

    /**
     * Create the activity relationship lookup
     */
    public function activity()
    {
        return $this->belongsTo(activities::class);
    }

    /**
     * Create the user relationship lookup
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Create the team relationship lookup
     */
    public function team()
    {
        return $this->belongsTo(team::class);
    }

}
