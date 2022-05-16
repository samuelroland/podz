<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
