<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(\App\Models\Post $post)
{
    $post->likes()->firstOrCreate(['user_id' => auth()->id()]);
    return back();
}

public function unlike(\App\Models\Post $post)
{
    $post->likes()->where('user_id', auth()->id())->delete();
    return back();
}
}
