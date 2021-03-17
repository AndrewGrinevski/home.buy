<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use App\Models\SellApartament;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelFavorite\Favorite;
use Overtrue\LaravelFollow\UserFollower;

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
        $favorite = Favorite::query()->where('user_id', '=', "{$idUser}")->get();

        if (isset($favorite)){
            foreach ($favorite as $item) {
                $sellFlats[] = SellApartament::query()->where('id', '=', "{$item->favoriteable_id}")->paginate(6);
            }
        }


        return view('main.user.favorite.allFlats', compact('sellFlats'));
    }

}
