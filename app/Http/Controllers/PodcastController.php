<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function create()
    {
        return view('podcasts.create');
    }

    public function store()
    {
        //TODO: refactor logic to make it shorter (maybe with mass assignation ?)
        $data = request()->all();

        Validator::make($data, [
            'title' => 'required|max:35',
            'description' => 'required|max:2000',
        ])->validate();

        $podcast = new Podcast();
        $podcast->title = $data['title'];
        $podcast->description = $data['description'];
        $podcast->user_id = auth()->id();
        $podcast->save();

        return redirect(route('podcasts.index'));
    }
}
