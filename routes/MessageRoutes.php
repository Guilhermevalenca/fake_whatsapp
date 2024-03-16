<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::prefix('messages')
    ->controller(MessageController::class)
    ->middleware('auth')
    ->group(function () {

        Route::post('{chat}', 'store')
            ->name('messages_store');
        Route::get('{chat}', 'show')
            ->name('messages_show');

    });
