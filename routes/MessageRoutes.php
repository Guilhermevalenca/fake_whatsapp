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
        Route::delete('{message}', 'destroy')
            ->name('messages_delete');

        Route::get('updated/is_send/{chat}', 'updated_isSend_messages')
            ->name('messages_updated_send');
    });
