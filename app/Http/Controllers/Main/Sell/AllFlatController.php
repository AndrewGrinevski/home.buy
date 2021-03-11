<?php

namespace App\Http\Controllers\Main\Sell;

use App\Http\Controllers\Controller;
use App\Models\Balcony;
use App\Models\Room;
use App\Models\SellApartament;
use App\Models\Wall;
use App\Traits\SellFlats\SearchTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Overtrue\LaravelFollow\Followable;
use willvincent\Rateable\Rating;


class AllFlatController extends Controller
{
    use SearchTrait;
    use Followable;

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
        return view('main.sell.showFlat', compact('sellFlat'));
    }

    public function flatsFlat(Request $request)
    {

        request()->validate(['rate' => 'required']);
        $authId = auth()->id();
        $flat = SellApartament::find($request->id);
        $rate = Rating::query()
        ->where('user_id', '=', "{$authId}")
        ->where('rateable_id', '=', "{$request->id}")
        ->get();

        if (isset($rate[0]->rating)) {
            $flat->rateOnce($request->rate);
            return redirect()->route('main.allFlats.show', ['slug' => $flat->slug]);
        }else {
            $rating = new Rating;
            $rating->rating = $request->rate;
            $rating->user_id = auth()->id();
            $flat->ratings()->save($rating);
            return redirect()->route('main.allFlats.show', ['slug' => $flat->slug]);
        }
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
