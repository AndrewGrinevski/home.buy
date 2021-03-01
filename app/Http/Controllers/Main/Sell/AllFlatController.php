<?php

namespace App\Http\Controllers\Main\Sell;

use App\Http\Controllers\Controller;
use App\Models\Balcony;
use App\Models\Room;
use App\Models\SellApartament;
use App\Models\Wall;
use Illuminate\Http\Request;

class AllFlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellFlats = SellApartament::orderBy('updated_at')->paginate(6);
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        return view('main.sell.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies'));
    }

    /**
     * Display the specified resource.
     * @param string $slug
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $sellFlat = SellApartament::whereSlug($slug)->firstOrFail();
        return view('main.sell.showFlat', compact('sellFlat'));
    }

    public function showOneRoomFlats()
    {
        $sellFlats = SellApartament::where('number_of_rooms_id', '=', '1')->orderBy('updated_at')->paginate(6);
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        return view('main.sell.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies'));
    }

    public function showTwoRoomFlats()
    {
        $sellFlats = SellApartament::where('number_of_rooms_id', '=', '2')->orderBy('updated_at')->paginate(6);
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        return view('main.sell.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies'));
    }

    public function showThreeRoomFlats()
    {
        $sellFlats = SellApartament::where('number_of_rooms_id', '=', '3')->orderBy('updated_at')->paginate(6);
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        return view('main.sell.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies'));
    }

    public function showFourPlusRoomFlats()
    {
        $sellFlats = SellApartament::where('number_of_rooms_id', '>', '3')->orderBy('updated_at')->paginate(6);
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        return view('main.sell.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies'));
    }


    public function search(Request $request)
    {
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        $flatsQuery = SellApartament::query();
        //Город
        if ($request->filled('town')) {
            $flatsQuery->where('town', 'LIKE', "%{$request->town}%")->orderBy('town');
        }
        //Количество комнат
        if ($request->filled('rooms')) {
            $flatsQuery->where('number_of_rooms_id', '=', $request->rooms);
        }
        //Цена
        if ($request->filled('min_price')) {
            $flatsQuery->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $flatsQuery->where('price', '<=', $request->max_price);
        }
        //Общая площадь
        if ($request->filled('min_total_area')) {
            $flatsQuery->where('total_area', '>=', $request->min_total_area);
        }
        if ($request->filled('max_total_area')) {
            $flatsQuery->where('total_area', '<=', $request->max_total_area);
        }
        //Жилая площадь
        if ($request->filled('min_living_area')) {
            $flatsQuery->where('living_area', '>=', $request->min_living_area);
        }
        if ($request->filled('max_living_area')) {
            $flatsQuery->where('living_area', '<=', $request->max_living_area);
        }
        //Площадь кухни
        if ($request->filled('min_kitchen_area')) {
            $flatsQuery->where('kitchen_area', '>=', $request->min_kitchen_area);
        }
        if ($request->filled('max_kitchen_area')) {
            $flatsQuery->where('kitchen_area', '<=', $request->max_kitchen_area);
        }
        //Этаж
        if ($request->filled('min_floor')) {
            $flatsQuery->where('floor', '>=', $request->min_floor);
        }
        if ($request->filled('max_floor')) {
            $flatsQuery->where('floor', '<=', $request->max_floor);
        }
        //Кол-во этажей
        if ($request->filled('min_total_floor')) {
            $flatsQuery->where('total_floors', '>=', $request->min_total_floor);
        }
        if ($request->filled('max_total_floor')) {
            $flatsQuery->where('total_floors', '<=', $request->max_total_floor);
        }
        //Год постройки
        if ($request->filled('min_year')) {
            $flatsQuery->where('year_of_construction', '>=', $request->min_year);
        }
        if ($request->filled('max_year')) {
            $flatsQuery->where('year_of_construction', '<=', $request->max_year);
        }
        //Материал стен
        if ($request->filled('type_of_walls')) {
            $flatsQuery->where('type_of_walls_id', '=', $request->type_of_walls);
        }
        //Тип балкона
        if ($request->filled('balcony')) {
            $flatsQuery->where('balcony_id', '=', $request->balcony);
        }
       
        $sellFlats = $flatsQuery->paginate(6);
        return view('main.sell.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies'));

    }
}
