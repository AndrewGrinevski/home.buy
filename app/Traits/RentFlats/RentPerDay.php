<?php


namespace App\Traits\RentFlats;


use App\Models\Balcony;
use App\Models\Berth;
use App\Models\Room;
use App\Models\SellApartament;
use App\Models\Wall;
use Illuminate\Http\Request;

trait RentPerDay
{
    public function showOneRoomFlats()
    {
        $sellFlats = SellApartament::query()
            ->where('number_of_rooms_id', '=', '1')
            ->where('price', '=', null)
            ->where('rent_per_month', '=', null)
            ->orderBy('updated_at')->paginate(6);
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        return view('main.rent.perDay.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies'));
    }

    public function showTwoRoomFlats()
    {
        $sellFlats = SellApartament::query()
            ->where('number_of_rooms_id', '=', '2')
            ->where('price', '=', null)
            ->where('rent_per_month', '=', null)
            ->orderBy('updated_at')->paginate(6);
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        return view('main.rent.perDay.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies'));
    }

    public function showThreeRoomFlats()
    {
        $sellFlats = SellApartament::query()
            ->where('number_of_rooms_id', '=', '3')
            ->where('price', '=', null)
            ->where('rent_per_month', '=', null)
            ->orderBy('updated_at')->paginate(6);
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        return view('main.rent.perDay.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies'));
    }

    public function showFourPlusRoomFlats()
    {
        $sellFlats = SellApartament::query()
            ->where('number_of_rooms_id', '>', '3')
            ->where('price', '=', null)
            ->where('rent_per_month', '=', null)
            ->orderBy('updated_at')->paginate(6);
        $rooms = Room::all();
        $balconies = Balcony::all();
        $walls = Wall::all();
        return view('main.rent.perDay.allFlats', compact('sellFlats', 'walls', 'rooms', 'balconies'));
    }

    public function search(Request $request)
    {
        $rooms = Room::all();
        $berths = Berth::all();
        $balconies = Balcony::all();
        $flatsQuery = SellApartament::query();
        //Город
        if ($request->filled('town')) {
            $flatsQuery->where('town', 'LIKE', "%{$request->town}%")->orderBy('town');
        }
        //Количество комнат
        if ($request->filled('rooms')) {
            $flatsQuery->where('number_of_rooms_id', '=', $request->rooms);
        }
        //Количество спальных мест
        if ($request->filled('berths')) {
            $flatsQuery->where('number_of_berths_id', '=', $request->berths);
        }
        //Цена
        if ($request->filled('min_rent_per_day')) {
            $flatsQuery->where('price', '>=', $request->min_rent_per_day);
        }
        if ($request->filled('max_rent_per_day')) {
            $flatsQuery->where('price', '<=', $request->max_rent_per_day);
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

        //Тип балкона
        if ($request->filled('balcony')) {
            $flatsQuery->where('balcony_id', '=', $request->balcony);
        }

        $sellFlats = $flatsQuery
            ->where('price', '=', null)
            ->where('rent_per_month', '=', null)
            ->paginate(6)
            ->withPath("?" . $request->getQueryString());
        return view('main.rent.perDay.allFlats', compact('sellFlats', 'rooms', 'balconies', 'berths'));

    }
}

