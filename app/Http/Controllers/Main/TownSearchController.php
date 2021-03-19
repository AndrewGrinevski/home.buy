<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\SellApartment;
use App\Models\Town;
use App\Traits\DynamicAutocompleteSearchTrait;
use Illuminate\Http\Request;

class TownSearchController extends Controller
{
    public function selectSearch(Request $request)
    {
        $towns = [];
        $count = SellApartment::count();
        if ($count == 0){
            if ($request->has('q')) {
                $search = $request->q;
                $towns = Town::query()->select("id", "town")
                    ->where('town', 'LIKE', "%$search%")
                    ->get();
            }
        }else{
            if ($request->has('q')) {
                $search = $request->q;
                $towns = Town::query()->select("id", "town")
                    ->where('town', 'LIKE', "%$search%")
                    ->get();
            }
        }

        return response()->json($towns);
    }
}
