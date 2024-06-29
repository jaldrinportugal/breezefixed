<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Message;

class AdminMessagesController extends Controller
{
    
    public function index(){   
        $messages = Message::all();
        return view('admin.messages.messages', compact('messages'));
    }

    public function createMessage(){
        return view('admin.messages.create');
    }

    public function storeMessage(Request $request){
        $request->validate([
            'message' => 'required|string',
        ]);

        $message = Message::create([
            'message' => $request->input('message'),
        ]);

        return redirect()->route('admin.messages')
            ->with('success', 'Message added successfully!');
    }

    
}