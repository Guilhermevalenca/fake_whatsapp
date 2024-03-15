<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::prefix('contact')
    ->controller(ContactController::class)
    ->group(function () {

        Route::post('', 'store')
            ->name('contact_store');

    });
