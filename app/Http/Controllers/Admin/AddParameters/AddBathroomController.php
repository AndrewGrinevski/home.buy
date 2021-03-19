<?php

namespace App\Http\Controllers\Admin\AddParameters;

use App\Http\Controllers\Controller;
use App\Models\Bathroom;
use Illuminate\Http\Request;

class AddBathroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bathrooms = Bathroom::all();
        return view('admin.addParam.bathrooms.index', compact('bathrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addParam.bathrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bathroom::create($request->all());
        return redirect()->route('admin.addParam.bathroom.index');
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
        $bathroom = Bathroom::findOrFail($id);
        return view('admin.addParam.bathrooms.edit', compact('bathroom'));
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
        $bathroom = Bathroom::findOrFail($id);
        $bathroom->fill($request->all());
        $bathroom->save();
        return redirect()->route('admin.addParam.bathroom.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bathroom = Bathroom::findOrFail($id);
        $bathroom->delete();
        return redirect()->route('admin.addParam.bathroom.index');
    }
}
