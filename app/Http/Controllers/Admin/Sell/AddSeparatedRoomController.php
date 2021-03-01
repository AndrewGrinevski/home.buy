<?php

namespace App\Http\Controllers\Admin\Sell;

use App\Http\Controllers\Controller;
use App\Models\SeparatedRoom;
use Illuminate\Http\Request;

class AddSeparatedRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $separatedRooms = SeparatedRoom::all();
        return view('admin.sell.addParam.separatedRooms.index', compact('separatedRooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sell.addParam.separatedRooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SeparatedRoom::create($request->all());
        return redirect()->route('admin.addParam.separatedRoom.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $separatedRoom = SeparatedRoom::findOrFail($id);
        return view('admin.sell.addParam.separatedRooms.edit', compact('separatedRoom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $separatedRoom = SeparatedRoom::findOrFail($id);
        $separatedRoom->fill($request->all());
        $separatedRoom->save();
        return redirect()->route('admin.addParam.separatedRoom.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $separatedRoom = SeparatedRoom::findOrFail($id);
        $separatedRoom->delete();
        return redirect()->route('admin.addParam.separatedRoom.index');
    }
}
