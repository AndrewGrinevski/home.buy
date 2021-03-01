<?php

namespace App\Http\Controllers\Admin\Sell;

use App\Http\Controllers\Controller;
use App\Models\Repair;
use Illuminate\Http\Request;

class AddRepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repairs = Repair::all();
        return view('admin.sell.addParam.repair.index', compact('repairs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sell.addParam.repair.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Repair::create($request->all());
        return redirect()->route('admin.addParam.repair.index');
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
        $repair = Repair::findOrFail($id);
        return view('admin.sell.addParam.repair.edit', compact('repair'));
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
        $repair = Repair::findOrFail($id);
        $repair->fill($request->all());
        $repair->save();
        return redirect()->route('admin.addParam.repair.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repair = Repair::findOrFail($id);
        $repair->delete();
        return redirect()->route('admin.addParam.repair.index');
    }
}
