<?php

namespace App\Http\Controllers\Main\Sell;

use App\Http\Controllers\Controller;
use App\Models\Balcony;
use App\Models\Room;
use App\Models\SellApartment;
use App\Models\Wall;
use App\Traits\FavoriteTrait;
use App\Traits\RaitTrait;
use App\Traits\SellFlats\SearchTrait;
use App\Traits\ShowOtherOffersTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AllFlatController extends Controller
{
    use SearchTrait;
    use ShowOtherOffersTrait;
    use RaitTrait;
    use FavoriteTrait;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sellFlats = SellApartment::query()
            ->where('rent_per_month', '=', null)
            ->where('rent_per_day', '=', null)
            ->where('is_banned', '=', false)
            ->latest()
            ->paginate(8);
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        $user = Auth::user();

        return view('main.sell.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies', 'user'));
    }


    /**
     * Display the specified resource.
     * @param string $slug
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $sellFlat = SellApartment::whereSlug($slug)->firstOrFail();
        $location = explode(',', $sellFlat->location);
        $sellFlats = $this->showOtherOffers($sellFlat);
        $user = Auth::user();
        return view('main.sell.showFlat', compact('sellFlat', 'sellFlats', 'location', 'user'));
    }
}
