<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Balcony;
use App\Models\Room;
use App\Models\SellApartament;
use App\Models\Wall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellFlats = SellApartament::query()->latest()->limit(4)->get();

        $rooms = Room::all();
        $walls = Wall::all();
        $balconies = Balcony::all();
        $user = Auth::user();
        return view('main.index', compact('walls', 'balconies','rooms', 'sellFlats', 'user'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxRequest(Request $request){

        $sellFlats = SellApartament::find($request->id);
        $response = auth()->user()->toggleFavorite($sellFlats);
        return response()->json(['success'=>$response]);
    }

}
