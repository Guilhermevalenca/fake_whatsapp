<?php

namespace App\Http\Resources;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatResourceCreate extends JsonResource
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
            'data_contact' => $this->data_contact,
            'contact' => $this->contact,
            'exist_chat' => Chat::where('id', '=', $this->id)->select('id')->first()
        ];
    }
}
