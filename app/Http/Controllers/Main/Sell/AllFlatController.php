<?php

namespace App\Http\Controllers\Main\Sell;

use App\Http\Controllers\Controller;
use App\Models\Balcony;
use App\Models\Room;
use App\Models\SellApartament;
use App\Models\Wall;
use App\Traits\DynamicAutocompleteSearchTrait;
use App\Traits\RaitTrait;
use App\Traits\SellFlats\SearchTrait;
use App\Traits\ShowOtherOffersTrait;
use Illuminate\Http\Request;


class AllFlatController extends Controller
{
    use SearchTrait;
    use ShowOtherOffersTrait;
    use RaitTrait;
    use DynamicAutocompleteSearchTrait;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sellFlats = SellApartament::query()
            ->where('rent_per_month', '=', null)
            ->where('rent_per_day', '=', null)
            ->paginate(6);
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        return view('main.sell.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies'));
    }

    /**
     * Display the specified resource.
     * @param string $slug
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $sellFlat = SellApartament::whereSlug($slug)->firstOrFail();
        $sellFlats = $this->showOtherOffers($sellFlat);
        return view('main.sell.showFlat', compact('sellFlat', 'sellFlats'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxRequest(Request $request){

        $sellFlats = SellApartament::find($request->id);
        $response = auth()->user()->toggleFollow($sellFlats);

        return response()->json(['success'=>$response]);
    }
}
