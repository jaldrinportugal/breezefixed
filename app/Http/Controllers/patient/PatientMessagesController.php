<?php

namespace App\Http\Controllers\patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Message;

class PatientMessagesController extends Controller
{
    
    public function index(){   
        $messages = Message::all();
        return view('patient.messages.messages', compact('messages'));
    }

    public function createMessage(){
        return view('patient.messages.create');
    }

    public function storeMessage(Request $request){
        $request->validate([
            'message' => 'required|string',
        ]);

        $message = Message::create([
            'message' => $request->input('message'),
        ]);

        return redirect()->route('patient.messages')
            ->with('success', 'Message added successfully!');
    }

    
}