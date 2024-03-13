<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_id',
        'fixed',
        'archived'
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'chat_id');
    }
    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class, 'id', 'contact_id');
    }
}
