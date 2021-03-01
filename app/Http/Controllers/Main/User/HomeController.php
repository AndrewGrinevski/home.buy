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
        $id = Auth::id();
        $flats = SellApartament::query()->where('contacts_id', '=', "{$id}")->paginate(15);
        return view('main.user.home', compact('flats'));
    }


}
