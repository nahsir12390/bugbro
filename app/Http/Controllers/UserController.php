<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Friendship;

class UserController extends Controller
{
    public function profile(User $user)
    {
        $posts = $user->posts()->latest()->get();
       

        // Friendship status logic
      
        return view('users.profile', compact('user', 'posts'));
    }
}