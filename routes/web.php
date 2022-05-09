<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PodcastController;


Route::controller(PodcastController::class)->group(function () {
    Route::get('/', 'index')->name('podcasts.index');
    Route::get('/podcasts/{podcast}', 'show')->name('podcasts.show');
});
