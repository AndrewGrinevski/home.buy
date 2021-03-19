<?php


namespace App\Traits;


use App\Models\sellApartment;
use Illuminate\Http\Request;
use willvincent\Rateable\Rating;

trait RaitTrait
{
    public function flatsFlat(Request $request)
    {

        request()->validate(['rate' => 'required']);
        $authId = auth()->id();
        $flat = sellApartment::find($request->id);
        $rate = Rating::query()
            ->where('user_id', '=', "{$authId}")
            ->where('rateable_id', '=', "{$request->id}")
            ->get();

        if (isset($rate[0]->rating)) {
            $flat->rateOnce($request->rate);
        }else {
            $rating = new Rating;
            $rating->rating = $request->rate;
            $rating->user_id = auth()->id();
            $flat->ratings()->save($rating);
        }

            return redirect()->back();
    }
}
