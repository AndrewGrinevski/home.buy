<?php

namespace App\Http\Controllers\Admin\Sell;

use App\Http\Controllers\Controller;
use App\Models\Wall;
use Illuminate\Http\Request;

class AddWallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $walls = Wall::all();
        return view('admin.sell.addParam.wall.index', compact('walls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sell.addParam.wall.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Wall::create($request->all());
        return redirect()->route('admin.addParam.wall.index');
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
        $wall = Wall::findOrFail($id);
        return view('admin.sell.addParam.wall.edit', compact('wall'));
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
        $wall = Wall::findOrFail($id);
        $wall->fill($request->all());
        $wall->save();
        return redirect()->route('admin.addParam.wall.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wall = Wall::findOrFail($id);
        $wall->delete();
        return redirect()->route('admin.addParam.wall.index');
    }
}
