<?php

namespace App\Http\Controllers\Main\User;

use App\Events\AddSellRoomEvent;
use App\Http\Controllers\Controller;
use App\Models\Balcony;
use App\Models\Bathroom;
use App\Models\Berth;
use App\Models\Room;
use App\Models\SellApartament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AddRentApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        $berths = Berth::all();
        $balconies = Balcony::all();
        $bathrooms = Bathroom::all();
        return view('main.user.rent.apartment.create', compact('rooms','berths',
            'balconies', 'bathrooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paths = [];

        foreach ($request->file('images') as $file) {
            $paths[] = $file->store('usersImage');
        }

        $params = $request->all();
        $params['first_img_name'] = $paths[0];
        $params['second_img_name'] = $paths[1];
        $params['third_img_name'] = $paths[2];
        $params['four_img_name'] = $paths[3];
        $params['five_img_name'] = $paths[4];
        $params['contacts_id'] = Auth::id();
        if ($params['number_of_rooms_id'] == 1 ){
            $params['number_of_rooms'] = '1-комнатная квартира';
        }elseif ($params['number_of_rooms_id'] == 2){
            $params['number_of_rooms'] = '2-комнатная квартира';
        }elseif ($params['number_of_rooms_id'] == 3){
            $params['number_of_rooms'] = '3-комнатная квартира';
        }elseif ($params['number_of_rooms_id'] == 4){
            $params['number_of_rooms'] = '4-комнатная квартира';
        }elseif ($params['number_of_rooms_id'] == 5){
            $params['number_of_rooms'] = '5-комнатная квартира';
        }elseif ($params['number_of_rooms_id'] == 6){
            $params['number_of_rooms'] = '6-комнатная квартира';
        }elseif ($params['number_of_rooms_id'] == 9){
            $params['number_of_rooms'] = '7-комнатная квартира';
        }
        $sellRoom = SellApartament::create($params);
        //foreach ($paths as $path) {
        //    Image::create(['apartament_id'=>$sellRoom->id,'image'=>$path]);
        //}

        event(new AddSellRoomEvent($sellRoom));
        return redirect()->route('home', ['id' =>auth()->id()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rooms = Room::all();
        $berths = Berth::all();
        $balconies = Balcony::all();
        $bathrooms = Bathroom::all();
        $sellRoom = SellApartament::findOrFail($id);
        return view('main.user.rent.apartment.edit', compact('sellRoom', 'rooms',
            'balconies', 'bathrooms', 'berths'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sellRoom = SellApartament::findOrFail($id);
        $sellRoom->fill($request->all());
        if (($request->file())!=null){
            $paths = [];
            Storage::delete([$sellRoom->first_img_name, $sellRoom->second_img_name,$sellRoom->third_img_name,$sellRoom->four_img_name,$sellRoom->five_img_name]);
            foreach ($request->file('images') as $file) {
                $paths[] = $file->store('usersImage');
            }

            $sellRoom['first_img_name'] =$paths[0];
            $sellRoom['second_img_name'] = $paths[1];
            $sellRoom['third_img_name'] = $paths[2];
            $sellRoom['four_img_name'] = $paths[3];
            $sellRoom['five_img_name'] = $paths[4];
            $sellRoom->fridge = $request->input('fridge', false);
            $sellRoom->elevator = $request->input('elevator', false);
            $sellRoom->internet = $request->input('internet', false);
            $sellRoom->furniture = $request->input('furniture', false);
            $sellRoom->washer = $request->input('washer', false);
            $sellRoom->dishes = $request->input('dishes', false);
            $sellRoom->microwave = $request->input('microwave', false);
            $sellRoom->tv = $request->input('tv', false);
            $sellRoom->wifi = $request->input('wifi', false);
            $sellRoom->jacuzzi = $request->input('jacuzzi', false);
            $sellRoom->save();
            event(new AddSellRoomEvent($sellRoom));
            return redirect()->route('home', ['id' =>auth()->id()]);

        }else {
            $sellRoom->fridge = $request->input('fridge', false);
            $sellRoom->elevator = $request->input('elevator', false);
            $sellRoom->internet = $request->input('internet', false);
            $sellRoom->furniture = $request->input('furniture', false);
            $sellRoom->washer = $request->input('washer', false);
            $sellRoom->dishes = $request->input('dishes', false);
            $sellRoom->microwave = $request->input('microwave', false);
            $sellRoom->tv = $request->input('tv', false);
            $sellRoom->wifi = $request->input('wifi', false);
            $sellRoom->jacuzzi = $request->input('jacuzzi', false);
            $sellRoom->save();
            event(new AddSellRoomEvent($sellRoom));
            return redirect()->route('home', ['id' =>auth()->id()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @param  \App\Models\SellApartament  $sellApartament
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sellRoom = SellApartament::findOrFail($id);
        $sellRoom->delete();
        return redirect()->route('home', ['id' =>auth()->id()]);
    }
}
