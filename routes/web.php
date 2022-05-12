<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PodcastController;


Route::controller(PodcastController::class)->group(function () {
    Route::get('/', 'index')->name('podcasts.index');

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/podcasts/create', 'create')->name('podcasts.create');
        Route::post('/', 'store')->name('podcasts.store');
    });
    Route::get('/podcasts/{podcast}', 'show')->name('podcasts.show');
});
