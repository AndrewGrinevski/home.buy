<?php


namespace App\Traits;


use App\Models\Town;
use Illuminate\Http\Request;

trait DynamicAutocompleteSearchTrait
{
    public function selectSearch(Request $request)
    {
        $towns = [];

        if ($request->has('q')) {
            $search = $request->q;
            $towns = Town::query()->select("id", "town")
                ->where('town', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($towns);
    }
}
