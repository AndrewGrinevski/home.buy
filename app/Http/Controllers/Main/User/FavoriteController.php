<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use App\Models\sellApartment;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelFavorite\Favorite;

class FavoriteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser = Auth::id();
        $sellFlats = null;
        $favorite = Favorite::query()
            ->where('user_id', '=', "{$idUser}")
            ->get();

        if (isset($favorite)){
            foreach ($favorite as $item) {
                $sellFlats[] = sellApartment::query()
                    ->where('id', '=', "{$item->favoriteable_id}")
                    ->where('is_banned', '=', false)
                    ->paginate(8);
            }
        }


        return view('main.user.favorite.allFlats', compact('sellFlats'));
    }

}
