<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
    $posts = Post::with('user')->latest()->paginate(5);
    $currentUser = auth()->user(); // Pass the current user

    return view('posts.post', compact('posts', 'currentUser'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.¬
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        
            'content' => 'required|string|max:255'
        
    ]);

    // Attach the authenticated user
    $post = auth()->user()->posts()->create($validated);

    return redirect()->route('show.post')->with('success', 'Post created!');
}

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = auth()->user()->posts()->findOrFail($id);
        return view('posts.editPost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
           
            'content' => 'required|string|max:255'   ]);

        // Update the post
        $post = auth()->user()->posts()->findOrFail($id);
        if (!$post) {
            return redirect()->back()->withErrors(['post' => 'Post not found']);
        }
        $post->update($validated);

        return redirect()->route('show.post')->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = auth()->user()->posts()->findOrFail($id);
        $post->delete();
        return redirect()->route('show.post')->with('success', 'Post deleted successfully');
    }
}
