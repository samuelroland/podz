<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
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

    public static function getNextNumber($podcastId)
    {
        $result = DB::table('episodes')->selectRaw('max(number) as max')->where('podcast_id', $podcastId)->first();
        return $result->max + 1;
    }
}
