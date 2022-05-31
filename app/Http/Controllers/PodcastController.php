<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class PodcastController extends Controller
{
    public function index()
    {
        $podcasts = Podcast::with(['episodes', 'author'])->get();
        return view('podcasts.index', ['podcasts' => $podcasts]);
    }

    public function show(Podcast $podcast)
    {
        return view('podcasts.show', ['podcast' => $podcast]);
    }

    public function create()
    {
        return view('podcasts.create');
    }

    public function store()
    {
        $data = request()->all();

        Validator::make($data, [
            'title' => ['required', 'max:35', Rule::unique(with(new Podcast)->getTable(), 'title')->where(fn ($query) => $query->where('user_id', auth()->id())),],
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
