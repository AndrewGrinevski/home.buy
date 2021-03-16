<?php


namespace App\Traits\SellFlats;


use App\Models\Balcony;
use App\Models\Room;
use App\Models\SellApartament;
use App\Models\Wall;
use Illuminate\Http\Request;

trait SearchTrait
{
    public function showOneRoomFlats()
    {
        $sellFlats = SellApartament::query()
            ->where('number_of_rooms_id', '=', '1')
            ->where('rent_per_month', '=', null)
            ->where('rent_per_day', '=', null)
            ->orderBy('updated_at')->paginate(6);
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        return view('main.sell.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies'));
    }

    public function showTwoRoomFlats()
    {
        $sellFlats = SellApartament::query()
            ->where('number_of_rooms_id', '=', '2')
            ->where('rent_per_month', '=', null)
            ->where('rent_per_day', '=', null)
            ->orderBy('updated_at')->paginate(6);
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        return view('main.sell.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies'));
    }

    public function showThreeRoomFlats()
    {
        $sellFlats = SellApartament::query()
            ->where('number_of_rooms_id', '=', '3')
            ->where('rent_per_month', '=', null)
            ->where('rent_per_day', '=', null)
            ->orderBy('updated_at')->paginate(6);
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        return view('main.sell.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies'));
    }

    public function showFourPlusRoomFlats()
    {
        $sellFlats = SellApartament::query()
            ->where('number_of_rooms_id', '>', '3')
            ->where('rent_per_month', '=', null)
            ->where('rent_per_day', '=', null)
            ->orderBy('updated_at')->paginate(6);
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
        if ($request->filled('town_id')) {
            $flatsQuery->where('town_id', '=', $request->town_id);
        }
        //Количество комнат
        if ($request->filled('min_rooms')) {
            $flatsQuery->where('number_of_rooms_id', '>=', $request->min_rooms);
        }
        if ($request->filled('max_rooms')) {
            $flatsQuery->where('number_of_rooms_id', '<=', $request->max_rooms);
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

        $sellFlats = $flatsQuery
            ->where('rent_per_month', '=', null)
            ->where('rent_per_day', '=', null)
            ->paginate(5)
            ->withPath("?" . $request->getQueryString());
        return view('main.sell.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies'));

    }
}
