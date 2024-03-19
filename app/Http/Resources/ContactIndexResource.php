<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->user_id === auth()->id() ? $this->name : $this->phone . '(Contato desconhecido)',
            'user_id' => $this->user_id,
            'contact_blocked' => $this->contact_blocked,
            'chat_id' => $this->chat_id,
            'chat' => [
                'id' => $this->chat->id,
                'fixed' => $this->chat->fixed,
                'archived' => $this->chat->archived,
                'current_message' => [
                    'id' => $this->chat->current_message->id,
                    'content' => $this->chat->current_message->content,
                    'is_send' => $this->chat->current_message->is_send,
                    'path' => $this->chat->current_message->path,
                    'type' => $this->chat->current_message->type,
                    'user_id' => $this->chat->current_message->user_id,
                    'visible_to_me' => $this->chat->current_message->visible_to_me,
                    'visible_to_you' => $this->chat->current_message->visible_to_you
                ]
            ]
        ];
    }
}
