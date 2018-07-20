<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'password', 'content', 'photo',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    
    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }
    
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    
    public function follow($groupId)
    {
        $exist = $this->is_following($groupId);
    
        if ($exist) {
            return false;
        } else {
            $this->groups()->attach($groupId);
            return true;
        }
    }

    public function unfollow($groupId)
    {
        $exist = $this->is_following($groupId);
    
        if ($exist) {
            $this->groups()->detach($groupId);
            return true;
        } else {
            return false;
        }
    }

    public function is_following($groupId) {
        return $this->groups()->where('group_id', $groupId)->exists();
    }
    
    public function want_item()
    {
        return $this->belongsTo(Item::class);
    }
    
    public function usericon()
    {
        $image_rand = array(
                        "images/user6.jpg",
                        "images/user2.jpg",
                        "images/user3.jpg", 
                        "images/user4.jpg", 
                        "images/user5.jpg"
                    );
        $image_path = $image_rand[mt_rand(0, count($image_rand)-1)];

    }

}
