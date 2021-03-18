<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SellApartament;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $allAds = SellApartament::all();
        $sellFlats = SellApartament::query()
            ->where('rent_per_month', '=', null)
            ->where('rent_per_day', '=', null)
            ->get();
        $rentFlatPerMonth = SellApartament::query()
            ->where('price', '=', null)
            ->where('rent_per_day', '=', null)
            ->get();
        $rentFlatPerDay = SellApartament::query()
            ->where('price', '=', null)
            ->where('rent_per_month', '=', null)
            ->get();

        return view('admin.dashboard', compact('allAds','users', 'sellFlats', 'rentFlatPerMonth', 'rentFlatPerDay'));
    }
}
