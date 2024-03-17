<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'phone',
        'name',
        'contact_blocked',
        'chat_id'
    ];
    public function data_contact(): HasMany
    {
        return $this->hasMany(User::class, 'phone', 'phone');
    }
    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }
}
