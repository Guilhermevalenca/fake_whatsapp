<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('calls')
    ->middleware('auth')
    ->group(function() {

        Route::get('', function() {
            return Inertia::render('Calls/Calls');
        })->name('calls_index');

    });
