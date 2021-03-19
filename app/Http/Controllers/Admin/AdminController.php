<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sellApartment;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $allAds = sellApartment::all();
        $sellFlats = sellApartment::query()
            ->where('rent_per_month', '=', null)
            ->where('rent_per_day', '=', null)
            ->get();
        $rentFlatPerMonth = sellApartment::query()
            ->where('price', '=', null)
            ->where('rent_per_day', '=', null)
            ->get();
        $rentFlatPerDay = sellApartment::query()
            ->where('price', '=', null)
            ->where('rent_per_month', '=', null)
            ->get();

        return view('admin.dashboard', compact('allAds','users', 'sellFlats', 'rentFlatPerMonth', 'rentFlatPerDay'));
    }
}
