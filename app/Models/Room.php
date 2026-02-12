<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'user_id', 'room_name', 'slug', 'desc', 'status', 'size'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
