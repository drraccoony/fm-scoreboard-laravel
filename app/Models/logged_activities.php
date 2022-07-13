<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logged_activities extends Model
{
    use HasFactory;

    public function activity()
    {
        return $this->belongsTo(activities::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(team::class);
    }

}
