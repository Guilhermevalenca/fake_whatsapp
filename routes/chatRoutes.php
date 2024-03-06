<?php

use App\Http\Controllers\ChatController;
use App\Http\Middleware\ChatShowNotFound;
use Illuminate\Support\Facades\Route;

Route::prefix('chat')
    ->middleware('auth')
    ->controller(ChatController::class)
    ->group(function () {

        Route::get('create', 'create')
            ->name('chat_create');
        Route::post('', 'store')
            ->name('chat_store');
        Route::middleware('webChat')
            ->get('{chat}','show')
            ->name('chat_show');
    });
