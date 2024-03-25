<?php

namespace App\Http\Controllers;

use App\Events\SendMessageEvent;
use App\Events\UpdateCheckMessageEvent;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Chat;
use App\Models\Message;

class MessageController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request, Chat $chat)
    {
        $validation = $request->validated();
        $validation['chat_id'] = $chat->id;
        $validation['user_id'] = auth()->id();
        $message = Message::create($validation);
        event(new SendMessageEvent($chat->id, $message));
//        $contact = Contact::where('chat_id', '=', $chat->id)
//            ->where('user_id', '!=', auth()->id())
//            ->select('user_id')
//            ->first();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        $messages = $chat->messages()
            ->orderByDesc('id')
            ->paginate(30);
        return response($messages, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }

    public function updated_isSend_messages(Chat $chat)
    {
        $messagesToEvent = Message::where('chat_id', '=', $chat->id)
            ->where('user_id', '!=', auth()->id());
        $messagesToEvent->update([
            'is_send' => 1
        ]);
        event(new UpdateCheckMessageEvent($chat->id, $messagesToEvent->get()));
        return back();
    }
}
