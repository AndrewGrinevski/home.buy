<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use App\Models\SellApartament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $follows = UserFollower::query()->where('follower_id', '=', "{$idUser}")->get();

        foreach ($follows as $follow) {
            $sellFlats[] = SellApartament::query()->where('id', '=', "{$follow->following_id}")->paginate(6);
        }

        return view('main.user.favorite.allFlats', compact('sellFlats'));
    }

}
