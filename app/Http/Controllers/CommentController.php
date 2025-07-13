<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Store a new comment
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);

        return back()->with('success', 'Comment added!');
    }

    // Show edit form for a comment
    public function edit(Comment $comment)
    {
        if (auth()->id() !== $comment->user_id) {
            abort(403);
        }

        return view('posts.commentsFolder.editComment', compact('comment'));
    }

    // Update the comment
    public function update(Request $request, Comment $comment)
    {
        if (auth()->id() !== $comment->user_id) {
            abort(403);
        }

        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $comment->update([
            'body' => $request->body,
        ]);

        return redirect()->route('show.post')->with('success', 'Comment updated!');
    }

    // Delete a comment
    public function destroy(Comment $comment)
    {
        if (auth()->id() !== $comment->user_id) {
            abort(403);
        }

        $comment->delete();

        return redirect()->route('show.post')->with('success', 'Comment deleted!');
    }
}
