<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function player_count()
    {
        // TODO: Implement this functionailty
        return -1;
    }

    public function total_score()
    {
        // TODO: Implement this functionailty
        return -1;
    }

}
