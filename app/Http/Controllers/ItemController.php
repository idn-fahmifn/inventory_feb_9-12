<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate(10);
        $rooms = Room::all();
        return view('items.index', compact('items', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => ['required', 'string', 'max:30'],
            'location' => ['required', 'integer'],
            'brand' => ['required', 'string', 'max:30'],
            'stok' => ['required', 'integer', 'min:0', 'max:999'],
            'image' => ['required', 'file', 'max:2048', 'mimes:png,jpg,jpeg,svg,webp,heic'],
            'date_purchase' => ['required', 'date'],
            'condition' => ['required', 'in:good,broke,maintenance'],
            'desc' => ['required']
        ]);

        $simpan = [
            'item_name' => $request->input('item_name'),
            'room_id' => $request->input('location'),
            'brand' => $request->input('brand'),
            'stok' => $request->input('stok'),
            'desc' => $request->input('desc'),
            'date_purchase' => $request->input('date_purchase'),
            'condition' => $request->input('condition'),
            'slug' => Str::orderedUuid()
        ];

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $path = 'public/images/items';
            $ext = $img->getClientOriginalExtension();
            $name = 'image_items_' . Carbon::now('Asia/Jakarta')->format('Ymdhis') . '.' . $ext; //image_items_20260212839043.jpg
            $simpan['image'] = $name;
            // simpan file ke storage : 
            $img->storeAs($path, $name);
        }

        // return $simpan;

        Item::create($simpan);
        return redirect()->route('item.index')->with('success', 'Room has been created');

    }

    public function show($param)
    {
        $item = Item::where('slug', $param)->firstOrFail();
        $rooms = Room::all();
        return view('items.show', compact('item', 'rooms'));
    }
}
