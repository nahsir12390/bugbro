<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Friendship;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
{
    // Send a friend request
    public function sendRequest($receiver_id)
    {
        $exists = Friendship::where([
            ['sender_id', Auth::id()],
            ['receiver_id', $receiver_id]
        ])->orWhere([
            ['sender_id', $receiver_id],
            ['receiver_id', Auth::id()]
        ])->first();

        if ($exists) return back()->with('error', 'Friend request already exists.');

        Friendship::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $receiver_id,
        ]);

        return back()->with('success', 'Friend request sent.');
    }

    // Accept a request
    public function acceptRequest($sender_id)
    {
        $friendRequest = Friendship::where('sender_id', $sender_id)
            ->where('receiver_id', Auth::id())
            ->where('status', 'pending')
            ->first();

        if (!$friendRequest) return back()->with('error', 'Request not found.');

        $friendRequest->update(['status' => 'accepted']);

        return back()->with('success', 'Friend request accepted.');
    }

    // View pending requests
    public function pendingRequests()
    {
        $requests = Friendship::where('receiver_id', Auth::id())
            ->where('status', 'pending')
            ->with('sender')
            ->get();

        return view('friends.pending', compact('requests'));
    }

    // View accepted friends
    public function friendsList()
    {
        $user = Auth::user();

        $friends = User::whereIn('id', function($query) use ($user) {
            $query->select('receiver_id')
                  ->from('friendships')
                  ->where('sender_id', $user->id)
                  ->where('status', 'accepted');
        })->orWhereIn('id', function($query) use ($user) {
            $query->select('sender_id')
                  ->from('friendships')
                  ->where('receiver_id', $user->id)
                  ->where('status', 'accepted');
        })->get();

        return view('friends.list', compact('friends'));
    }
    public function cancelRequest($receiver_id)
{
    $friendship = Friendship::where('sender_id', auth()->id())
        ->where('receiver_id', $receiver_id)
        ->where('status', 'pending')
        ->first();

    if (!$friendship) {
        return back()->with('error', 'Friend request not found.');
    }

    $friendship->delete();

    return back()->with('success', 'Friend request cancelled.');
}

}
