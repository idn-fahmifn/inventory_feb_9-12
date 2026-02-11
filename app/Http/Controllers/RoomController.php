<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::paginate(10);
        $user = User::where('isAdmin', false)->get();
        return view('rooms.index', compact('rooms', 'user'));
    }
}
