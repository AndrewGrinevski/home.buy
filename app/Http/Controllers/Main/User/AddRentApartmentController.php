<?php

namespace App\Http\Controllers\Main\User;

use App\Events\AddSellRoomEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddRentApartamentRequest;
use App\Models\Balcony;
use App\Models\Bathroom;
use App\Models\Berth;
use App\Models\Image;
use App\Models\Room;
use App\Models\SellApartament;
use App\Traits\CreateUpdateImagesTrait;
use App\Traits\DynamicAutocompleteSearchTrait;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AddRentApartmentController extends Controller
{
    use DynamicAutocompleteSearchTrait;

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
        $user = Auth::user();
        $rooms = Room::all();
        $berths = Berth::all();
        $balconies = Balcony::all();
        $bathrooms = Bathroom::all();
        return view('main.user.rent.apartment.create', compact('rooms','berths',
            'balconies', 'bathrooms', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRentApartamentRequest $request)
    {
        $requestImages = $request->file('images');
        $params = $request->all();

        $createImages = CreateUpdateImagesTrait::createImages($requestImages,$params);

        $images =  Image::create($createImages);

        $params['images_id'] = $images->id;
        $params['contacts_id'] = Auth::id();

        $sellRoom = SellApartament::create($params);
        event(new AddSellRoomEvent($sellRoom));

        return redirect()->route('home', ['id' => auth()->id()]);
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
        $user = Auth::user();
        $rooms = Room::all();
        $berths = Berth::all();
        $balconies = Balcony::all();
        $bathrooms = Bathroom::all();
        $sellRoom = SellApartament::findOrFail($id);
        return view('main.user.rent.apartment.edit', compact('sellRoom', 'rooms',
            'balconies', 'bathrooms', 'berths', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddRentApartamentRequest $request, $id)
    {
        $sellRoom = SellApartament::findOrFail($id);
        $images = Image::findOrFail($sellRoom->images_id);
        $sellRoom->fill($request->all());
        $issetRequestImages =$request->file();
        $requestImages =$request->file('images');

        CreateUpdateImagesTrait::updateImages($images,$issetRequestImages,$requestImages);

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
