<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\sellApartment;
use App\User;


class ShowUserAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);

        return view('admin.user.index', compact('users'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $a = 0;
        $b = 0;
        $c = 0;
        $sellFlats = sellApartment::query()
            ->where('rent_per_month', '=', null)
            ->where('rent_per_day', '=', null)
            ->where('contacts_id', $id)
            ->get();

        $rentFlatsPerDay = sellApartment::query()
            ->where('price', '=', null)
            ->where('rent_per_month', '=', null)
            ->where('contacts_id', $id)
            ->get();

        $rentFlats = sellApartment::query()
            ->where('price', '=', null)
            ->where('rent_per_day', '=', null)
            ->where('contacts_id', $id)
            ->get();

        return view('admin.user.userAds', compact('sellFlats', 'rentFlatsPerDay', 'rentFlats', 'a', 'b', 'c'));

    }


    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @param  \App\Models\sellApartment  $sellApartament
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $sellRoom = sellApartment::findOrFail($id);
        $sellRoom->delete();
        return redirect()->back();
    }
}
