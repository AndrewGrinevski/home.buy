<?php

namespace App\Http\Controllers\Admin\AddParameters;

use App\Http\Controllers\Controller;
use App\Models\Berth;
use Illuminate\Http\Request;

class AddBerthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berths = Berth::all();
        return view('admin.addParam.berths.index', compact('berths'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addParam.berths.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Berth::create($request->all());
        return redirect()->route('admin.addParam.berth.index');
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
        $berth = Berth::findOrFail($id);
        return view('admin.addParam.berths.edit', compact('berth'));
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
        $berth = Berth::findOrFail($id);
        $berth->fill($request->all());
        $berth->save();
        return redirect()->route('admin.addParam.berth.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berth = Berth::findOrFail($id);
        $berth->delete();
        return redirect()->route('admin.addParam.berth.index');
    }
}
