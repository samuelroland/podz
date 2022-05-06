<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Podcast extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    //Get a short version (only the start) of the description limited to $limit chars (+3 dots)
    public function getSummaryAttribute()
    {
        $limit = 150;
        if (Str::length($this->description) <= $limit) {
            return $this->description;
        }
        return Str::substr($this->description, 0, $limit) . "...";
    }
}
