<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [ 'content'];

      use HasFactory;
    

public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}

public function likes() {
    return $this->hasMany(Like::class);
}
public function isLikedBy($user) {
    return $this->likes()->where('user_id', $user->id)->exists();
}

public function comments() {
    return $this->hasMany(Comment::class);
}
public function views() {
    
}


}
