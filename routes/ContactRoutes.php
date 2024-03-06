<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::prefix('contact')
    ->controller(ContactController::class)
    ->group(function () {

        Route::post('addContact', 'store')
            ->name('contact_store');
        Route::post('searchContactByEmail', 'searchContactByEmail')
            ->name('contact_search');

    });
