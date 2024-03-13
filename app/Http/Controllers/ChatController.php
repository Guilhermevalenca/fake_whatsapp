<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ChatShowNotFound;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Http\Resources\ChatResourceCreate;
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
            ->select('id', 'contact')
            ->with('data_contact:id,name')
            ->get();
        return Inertia::render('Chat/CreateChat', [
            'contacts' => ChatResourceCreate::collection($contacts)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatRequest $request)
    {
        $validation = $request->validated();
        $chat = Chat::create($validation);
        return response([
            'chat' => $chat
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        $messages = $chat->messages()->get();
        $contact = $chat->contact()->first();
//        $contact['user'] =
        return Inertia::render('Chat/ChatOneOnOne', [
            'chat' => $chat,
            'messages' => $messages,
            'contact' => $contact
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
