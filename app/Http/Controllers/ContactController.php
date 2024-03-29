<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Resources\ContactIndexResource;
use App\Models\Chat;
use App\Models\Contact;
use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $contacts = Contact::whereNotNull('chat_id')
            ->where('user_id', '=', auth()->id())
            ->orWhere('phone', auth()->user()->phone)
            ->with(['chat' => function ($query) {
                $query->with('current_message');
            }])
            ->whereHas('chat', function ($query) {
                $query->where('archived', '=', 0);
            })
            ->get();

        return Inertia::render('Dashboard',[
            'contacts' => ContactIndexResource::collection($contacts)
        ]);
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
    public function store(StoreContactRequest $request)
    {
        $validation = $request->validated();
        $validation['user_id'] = auth()->id();
        Contact::create($validation);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
