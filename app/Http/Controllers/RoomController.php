<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::paginate(10);
        $user = User::where('isAdmin', false)->get();
        return view('rooms.index', compact('rooms', 'user'));
    }

    // Store room

    public function store(Request $request)
    {
        $request->validate([
            'room_name' => ['required','string', 'max:30'],
            'coordinator' => ['required','integer'],
            'size' => ['required', 'in:small,medium,large'],
            'status' => ['required', 'in:available,full,maintenance'],
            'desc' => ['required']
        ]);

        $simpan = [
            'room_name' => $request->input('room_name'),
            'user_id' => $request->input('coordinator'),
            'size' => $request->input('size'),
            'status' => $request->input('status'),
            'desc' => $request->input('desc'),
            'slug' => Str::orderedUuid()
        ];

        Room::create($simpan);
        return redirect()->route('room.index')->with('success', 'Room has been created');

    }

    public function show($param)
    {
        $room = Room::where('slug', $param)->firstOrFail();
        $user = User::where('isAdmin', false)->get();
        return view('rooms.show', compact('room', 'user'));
    }


}
