<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $casts = [
        'released_at' => 'datetime'
    ];

    public function getPathAttribute()
    {
        return "/podcasts/" . $this->filename;
    }
}
