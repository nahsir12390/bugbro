<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function posts()
{
    return $this->hasMany(Post::class);
}


public function sentMessages() {
    return $this->hasMany(Message::class, 'sender_id');
}

public function receivedMessages() {
    return $this->hasMany(Message::class, 'receiver_id');
}

public function likes() {
    return $this->hasMany(Like::class);
}

// app/Models/User.php

public function sentFriendRequests()
{
    return $this->hasMany(Friendship::class, 'sender_id');
}

public function receivedFriendRequests()
{
    return $this->hasMany(Friendship::class, 'receiver_id');
}

public function friends()
{
    return $this->belongsToMany(User::class, 'friendships', 'sender_id', 'receiver_id')
                ->wherePivot('status', 'accepted')
                ->withTimestamps();
}
 public function postViews() {
    
}


}
