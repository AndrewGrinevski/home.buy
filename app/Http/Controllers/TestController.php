<?php

namespace App\Http\Controllers;

use App\Models\Town;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){

        return view('test');
    }

    public function selectSearch(Request $request)
    {
        $towns = [];
        if ($request->has('q')) {
            $search = $request->q;
            $towns = Town::select("id", "town")
                ->where('town', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($towns);
    }
}
