<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function send()
    {
        return view('messages.index');
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        $message = Message::create($request->all());

        $user = User::findOrFail($message->user_id);

        broadcast(new SendMessage($message, $user));

        return redirect('message');
    }
}
