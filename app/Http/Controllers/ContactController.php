<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = ContactMessage::all();
        return response()->json($messages);
    }

    public function new_messages(){
    $numberOfMessages = ContactMessage::where('is_new', 1)->count();

    return response()->json(['number_messages' => $numberOfMessages]);
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_client' => 'required|string|max:255',
            'email_client' => 'required|email|max:255',
            'message_client' => 'required|string',
            'numero_tel' => 'required|string|max:255',
            'pays' => 'nullable|string|max:255',
        ]);

        $message = ContactMessage::create([
            'nom_client' => $request->nom_client,
            'email_client' => $request->email_client,
            'message_client' => $request->message_client,
            'numero_tel' => $request->numero_tel,
            'pays' => $request->pays ?? null
        ]);

        return response()->json([
            'message' => 'Message sent successfully!',
            'data' => $message
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = ContactMessage::findOrFail($id);
        return response()->json($message);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'is_new' => 'required|boolean',
        ]);

        $message = ContactMessage::findOrFail($id);
        $message->update([
            'is_new' => $validatedData['is_new'],
        ]);

        return response()->json([
            'message' => 'Message updated successfully!',
            'data' => $message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return response()->json([
            'message' => 'Message deleted successfully!'
        ]);
    }
}
