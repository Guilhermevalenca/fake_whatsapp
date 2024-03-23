<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('status')
    ->middleware('auth')
    ->group(function () {

        Route::get('', function() {
            return Inertia::render('Status/Status');
        })->name('status_index');

    });
