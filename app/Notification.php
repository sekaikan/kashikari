<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id', 'post_id', 'sender_id','content',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
