<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Balcony;
use App\Models\Room;
use App\Models\Wall;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        $walls = Wall::all();
        $balconies = Balcony::all();
        return view('main.index', compact('walls', 'balconies','rooms'));
    }

}
