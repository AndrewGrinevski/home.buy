<?php

namespace App\Http\Controllers\Main\Moderator;

use App\Http\Controllers\Controller;
use App\Models\sellApartment;
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
        $sellFlats = sellApartment::query()
            ->where('rent_per_month', '=', null)
            ->where('rent_per_day', '=', null)
            ->where('is_banned', '=', true)
            ->get();

        $rentFlatsPerDay = sellApartment::query()
            ->where('price', '=', null)
            ->where('rent_per_month', '=', null)
            ->where('is_banned', '=', true)
            ->get();

        $rentFlats = sellApartment::query()
            ->where('price', '=', null)
            ->where('rent_per_day', '=', null)
            ->where('is_banned', '=', true)
            ->get();
        return view('main.moderator.home', compact('sellFlats', 'rentFlatsPerDay', 'rentFlats', 'a', 'b', 'c'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('main.moderator.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->fill($request->all());
        $user->save();
        return redirect()->route('home.moderator', ['id' => auth()->id()]);
    }

    public function blockUnblock(Request $request)
    {
        $user =Auth::id();
        if (isset($request->block)) {
            $blockFlat = sellApartment::findOrFail($request->id);
            $blockFlat->is_banned = 1;
            $blockFlat->save();
        } else {
            $blockFlat = sellApartment::findOrFail($request->id);
            $blockFlat->is_banned = 0;
            $blockFlat->is_fixed = 0;
            $blockFlat->save();
        }

        return redirect()->route('home.moderator', $user);
    }
}

