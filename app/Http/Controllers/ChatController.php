<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Notifications\NewMessageNotification;

class ChatController extends Controller
{
    // Load chat index page with first 8 users
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())
                     ->latest()
                     ->limit(8)
                     ->get();

        return view('chats.index', compact('users'));
    }

public function send(Request $request)
{
    $request->validate([
        'receiver_id' => 'required|exists:users,id',
        'message' => 'required|string|max:1000'
    ]);

    $message = Message::create([
        'sender_id' => auth()->id(),
        'receiver_id' => $request->receiver_id,
        'message' => $request->message,
    ]);

    // Load sender relation for notification
    $message->load('sender');

    // Notify the receiver
    $receiver = User::find($request->receiver_id);
    $receiver->notify(new NewMessageNotification($message));

    return response()->json([
        'success' => true,
        'message' => 'Message sent!',
        'data' => $message
    ]);
}
    // Load chat between the authenticated user and another user
public function loadChat(User $user)
{
    // ✅ Mark all unread notifications from this user as read
    auth()->user()->unreadNotifications()
        ->where('type', 'App\Notifications\NewMessageNotification')
        ->get()
        ->each(function ($notification) use ($user) {
            if ($notification->data['sender_id'] === $user->id) {
                $notification->markAsRead();
            }
        });

    // Get chat messages
    $messages = Message::where(function ($query) use ($user) {
        $query->where('sender_id', auth()->id())
              ->where('receiver_id', $user->id);
    })->orWhere(function ($query) use ($user) {
        $query->where('sender_id', $user->id)
              ->where('receiver_id', auth()->id());
    })->with('sender')->orderBy('created_at')->get();

    //  Format messages
    $messages = $messages->map(function ($msg) {
        return [
            'id' => $msg->id,
            'message' => $msg->message,
            'sender_id' => $msg->sender_id,
            'sender' => [
                'id' => $msg->sender->id,
                'name' => $msg->sender->name,
            ],
            'created_at' => $msg->created_at->format('h:i A')
        ];
    });

    return response()->json($messages);
}
}
