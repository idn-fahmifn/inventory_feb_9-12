<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Room;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate(10);
        $rooms = Room::all();
        return view('items.index', compact('items', 'rooms'));
    }
}
