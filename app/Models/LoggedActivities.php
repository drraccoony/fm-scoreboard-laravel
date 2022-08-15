<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class LoggedActivities extends Model
{
    use HasFactory;

    /**
     * Create the Activity relationship lookup
     */
    public function activity()
    {
        return $this->belongsTo(Activities::class);
    }

    /**
     * Create the User relationship lookup
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Create the Team relationship lookup
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function scopeForUser($query, User $user)
    {
        return $query->whereHas('user', function (Builder $query) use ($user){
                return $query->where('id', $user->id);
            });

    }

}
