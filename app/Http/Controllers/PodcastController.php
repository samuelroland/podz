<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    public function index()
    {
        $podcasts = Podcast::all();
        return view('podcasts.index', ['podcasts' => $podcasts]);
    }

    public function show(Podcast $podcast)
    {
        //$isAuthor = auth()->check() && $podcast->author->is(auth()->user());

        return view('podcasts.show', ['podcast' => $podcast]);
    }
}
