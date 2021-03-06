<?php

namespace App\Http\Controllers\Main\Rent;

use App\Http\Controllers\Controller;
use App\Models\Balcony;
use App\Models\Room;
use App\Models\sellApartment;
use App\Models\Wall;
use App\Traits\RaitTrait;
use App\Traits\RentFlats\RentPerMonthTrait;
use App\Traits\ShowOtherOffersTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AllRentFlatPerMonthController extends Controller
{
    use RentPerMonthTrait;
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
            ->where('rent_per_day', '=', null)
            ->where('is_banned', '=', false)
            ->latest()
            ->paginate(8);
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        $user = Auth::user();
        return view('main.rent.perMonth.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies', 'user'));
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
        return view('main.rent.perMonth.showFlat', compact('sellFlat', 'sellFlats', 'location', 'user'));
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
