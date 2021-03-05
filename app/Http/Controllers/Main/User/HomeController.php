<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use App\Models\SellApartament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $a = 0;
        $b = 0;
        $c = 0;
        $id = Auth::id();
        $sellFlats = SellApartament::query()->where('contacts_id', '=', "{$id}")
            ->where('rent_per_month', '=', null)
            ->where('rent_per_day', '=', null)
            ->paginate(6);

        $rentFlatsPerDay = SellApartament::query()->where('contacts_id', '=', "{$id}")
            ->where('price', '=', null)
            ->where('rent_per_month', '=', null)
            ->paginate(6);

        $rentFlats = SellApartament::query()->where('contacts_id', '=', "{$id}")
            ->where('price', '=', null)
            ->where('rent_per_day', '=', null)
            ->paginate(6);

        return view('main.user.home', compact('sellFlats', 'rentFlatsPerDay', 'rentFlats', 'a', 'b', 'c'));
    }


}
