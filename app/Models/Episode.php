<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
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
        return "episodes/" . $this->filename;
    }

    public function scopePublic($query)
    {
        return $query->where('released_at', '<', now())->where('hidden', false);
    }

    public function podcast()
    {
        return $this->belongsTo(Podcast::class);
    }

    public function delete()
    {
        DB::transaction(function () {
            //Delete file on disk first
            Storage::disk('public')->delete($this->path);

            //Then delete the record in db
            parent::delete();
        });
    }
}
