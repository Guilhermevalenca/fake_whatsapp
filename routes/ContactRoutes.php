<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::prefix('contact')
    ->controller(ContactController::class)
    ->middleware('auth')
    ->group(function () {

        Route::get('', 'index')
            ->name('contact_index');
        Route::post('', 'store')
            ->name('contact_store');

    });
