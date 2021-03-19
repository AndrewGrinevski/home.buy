<?php


namespace App\Traits;


use App\Models\SellApartment;
use Illuminate\Http\Request;

trait FavoriteTrait
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxRequest(Request $request){

        $sellFlats = SellApartment::find($request->id);
        $response = auth()->user()->toggleFavorite($sellFlats);

        return response()->json(['success'=>$response]);
    }
}
