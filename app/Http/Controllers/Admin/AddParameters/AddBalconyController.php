<?php

namespace App\Http\Controllers\Admin\AddParameters;

use App\Http\Controllers\Controller;
use App\Models\Balcony;
use Illuminate\Http\Request;

class AddBalconyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balconies = Balcony::all();
        return view('admin.addParam.balconies.index', compact('balconies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addParam.balconies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Balcony::create($request->all());
        return redirect()->route('admin.addParam.balcony.index');
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
        $balcony = Balcony::findOrFail($id);
        return view('admin.addParam.balconies.edit', compact('balcony'));
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
        $balcony = Balcony::findOrFail($id);
        $balcony->fill($request->all());
        $balcony->save();
        return redirect()->route('admin.addParam.balcony.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $balcony = Balcony::findOrFail($id);
        $balcony->delete();
        return redirect()->route('admin.addParam.balcony.index');
    }
}
