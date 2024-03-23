<?php


use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('community')
    ->middleware('auth')
    ->group(function () {

        Route::get('', function() {
            return Inertia::render('Community/Community');
        })->name('community_index');

    });
