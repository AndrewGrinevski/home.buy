<?php

namespace App\Http\Controllers\Admin\Sell;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::paginate(15);
        return view('admin.sell.addParam.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sell.addParam.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Room::create($request->all());
        return redirect()->route('admin.addParam.room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room, $id)
    {
        $room = Room::findOrFail($id);
        return view('admin.sell.addParam.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room, $id)
    {
        $room = Room::findOrFail($id);
        $room->fill($request->all());
        $room->save();
        return redirect()->route('admin.addParam.room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room, $id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('admin.addParam.room.index')->with('success', 'Corona Case Data is successfully deleted');
    }
}
