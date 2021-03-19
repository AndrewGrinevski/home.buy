<?php

namespace App\Http\Controllers\Main\Rent;

use App\Http\Controllers\Controller;
use App\Models\Balcony;
use App\Models\Berth;
use App\Models\Room;
use App\Models\sellApartment;
use App\Models\Wall;
use App\Traits\RaitTrait;
use App\Traits\RentFlats\RentPerDayTrait;
use App\Traits\ShowOtherOffersTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AllRentFlatPerDayController extends Controller
{
    use RentPerDayTrait;
    use ShowOtherOffersTrait;
    use RaitTrait;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellFlats = sellApartment::query()
            ->where('price', '=', null)
            ->where('rent_per_month', '=', null)
            ->where('is_banned', '=', false)
            ->latest()
            ->paginate(8);
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        $berths = Berth::all();
        $user = Auth::user();
        return view('main.rent.perDay.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies', 'berths', 'user'));
    }

    /**
     * Display the specified resource.
     * @param string $slug
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $sellFlat = sellApartment::whereSlug($slug)->firstOrFail();
        $location = explode(',', $sellFlat->location);
        $sellFlats = $this->showOtherOffers($sellFlat);
        $user = Auth::user();
        return view('main.rent.perDay.showFlat', compact('sellFlat', 'sellFlats', 'location', 'user'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxRequest(Request $request){

        $sellFlats = sellApartment::find($request->id);
        $response = auth()->user()->toggleFollow($sellFlats);

        return response()->json(['success'=>$response]);
    }
}
