<?php

namespace App\Http\Resources;

use App\Models\Contact;
use App\Models\Message;
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
        $unread_messages = Message::where('chat_id','=', $this->chat->id)
            ->where('user_id', '!=', auth()->id())
            ->where('is_send', '=', 0)
            ->count();
        if($this->id === auth()->id()) {
            $exist_my_contact = 'my_contact';
        } else {
            $user_phone = User::select('phone')->find($this->user_id)->phone;
            $exist_my_contact = Contact::where('chat_id', '=', $this->chat_id)
                ->where('user_id', '=', auth()->id())
                ->where('phone', '=', $user_phone)
                ->exists();
            $this->name = $user_phone . ' (Contato desconhecido)';
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'user_id' => $this->user_id,
            'contact_blocked' => $this->contact_blocked,
            'chat_id' => $this->chat_id,
            'chat' => $this->chat,
            'unread_messages' => $unread_messages,
            'exist_my_contact' => $exist_my_contact,
        ];
    }
}
