<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model
{
    use HasFactory;

    protected $casts = [
        'released_at' => 'datetime',
        'hidden' => 'boolean'
    ];

    public function getPathAttribute()
    {
        return "/episodes/" . $this->filename;
    }
}
