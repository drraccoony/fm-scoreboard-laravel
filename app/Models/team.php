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
}
