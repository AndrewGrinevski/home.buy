<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use App\Models\sellApartment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        $sellFlats = sellApartment::query()->where('contacts_id', '=', "{$id}")
            ->where('rent_per_month', '=', null)
            ->where('rent_per_day', '=', null)
            ->get();

        $rentFlatsPerDay = sellApartment::query()->where('contacts_id', '=', "{$id}")
            ->where('price', '=', null)
            ->where('rent_per_month', '=', null)
            ->get();

        $rentFlats = sellApartment::query()->where('contacts_id', '=', "{$id}")
            ->where('price', '=', null)
            ->where('rent_per_day', '=', null)
            ->get();

        $banned = sellApartment::query()
            ->where('is_banned', '=', true)
            ->get();

        return view('main.user.home', compact('sellFlats', 'rentFlatsPerDay', 'rentFlats', 'banned', 'a', 'b', 'c'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('main.user.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->fill($request->all());
        $user->save();
        return redirect()->route('home', ['id' => auth()->id()]);
    }
}
