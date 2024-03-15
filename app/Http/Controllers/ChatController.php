<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Models\Chat;
use App\Models\Contact;
use Inertia\Inertia;

class ChatController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contacts = Contact::where('user_id', '=', auth()->id())
            ->select('id','name', 'chat_id','phone')
            ->with('data_contact:id,status,phone')
            ->get();
        return Inertia::render('Chat/CreateChat', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatRequest $request)
    {
        $validation = $request->validated();
        $contact = Contact::find($validation['contact_id']);
        $contact['data_contact'] = $contact->data_contact()->first();
        $heHasMyContact = Contact::where('phone', '=', auth()->user()->phone)
            ->where('user_id', '=', $contact['data_contact']->id);
        if($heHasMyContact->exists()) {
            $data_heHasMyContact = $heHasMyContact->first();
            if($data_heHasMyContact->chat_id) {
                $contact->update([
                    'chat_id' => $data_heHasMyContact->chat_id
                ]);
            } else {
                $chat = Chat::create();
                $contact->update([
                    'chat_id' => $chat->id
                ]);
                $heHasMyContact->update([
                    'chat_id' => $chat->id
                ]);
            }
        } else {
            $chat = Chat::create();
            $contact->update([
                'chat_id' => $chat->id
            ]);
            Contact::create([
                'name' => auth()->user()->phone,
                'user_id' => $contact['data_contact']->id,
                'phone' => auth()->user()->phone,
                'chat_id' => $chat->id
            ]);
        }
        return response([
            'chat' => $chat,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        $messages = $chat->messages()->get();
        return Inertia::render('Chat/ChatOneOnOne', [
            'chat' => $chat,
            'messages' => $messages
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
