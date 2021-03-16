<?php


namespace App\Traits;


use App\Models\SellApartament;
use Illuminate\Http\Request;
use willvincent\Rateable\Rating;

trait RaitTrait
{
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
        }else {
            $rating = new Rating;
            $rating->rating = $request->rate;
            $rating->user_id = auth()->id();
            $flat->ratings()->save($rating);
        }

        if ($flat->price == null && $flat->rent_per_day == null){
            return redirect()->route('main.allRentFlats.show', ['slug' => $flat->slug]);
        }elseif ($flat->rent_per_month == null && $flat->rent_per_day == null) {
            return redirect()->route('main.allFlats.show', ['slug' => $flat->slug]);
        }else {
            return redirect()->route('main.allRentApartments.show', ['slug' => $flat->slug]);
        }

    }
}
