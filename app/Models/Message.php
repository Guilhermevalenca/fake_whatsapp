<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'content',
        'path',
        'chat_id',
        'user_id',
        'visible_to_me',
        'visible_to_you',
        'is_send'
    ];
}
