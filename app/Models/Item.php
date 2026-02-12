<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'room_id', 'item_name', 'slug', 'desc', 'stok', 'brand', 'image', 'condition','date_purchase'
    ];


    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
