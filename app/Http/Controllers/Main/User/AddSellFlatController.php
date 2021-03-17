<?php

namespace App\Http\Controllers\Main\User;

use App\Events\AddSellRoomEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddFlatRequest;
use App\Models\Balcony;
use App\Models\Bathroom;
use App\Models\Image;
use App\Models\Repair;
use App\Models\Room;
use App\Models\SellApartament;
use App\Models\SeparatedRoom;
use App\Models\Transaction;
use App\Models\Wall;
use App\Traits\CreateUpdateImagesTrait;
use App\Traits\DynamicAutocompleteSearchTrait;
use Illuminate\Support\Facades\Auth;


class AddSellFlatController extends Controller
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
        $rooms = Room::all();
        $separatedRooms = SeparatedRoom::all();
        $balconies = Balcony::all();
        $bathrooms = Bathroom::all();
        $repairs = Repair::all();
        $walls = Wall::all();
        $transactions = Transaction::all();
        $user = Auth::user();
        return view('main.user.sell.flat.create', compact('rooms', 'separatedRooms',
            'balconies', 'bathrooms', 'repairs', 'walls', 'transactions', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddFlatRequest $request)
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rooms = Room::all();
        $separatedRooms = SeparatedRoom::all();
        $balconies = Balcony::all();
        $bathrooms = Bathroom::all();
        $repairs = Repair::all();
        $walls = Wall::all();
        $transactions = Transaction::all();
        $sellRoom = SellApartament::findOrFail($id);
        $user = Auth::user();
        return view('main.user.sell.flat.edit', compact('sellRoom', 'rooms', 'separatedRooms',
            'balconies', 'bathrooms', 'repairs', 'walls', 'transactions', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddFlatRequest $request, $id)
    {

        $sellRoom = SellApartament::findOrFail($id);
        $images = Image::findOrFail($sellRoom->images_id);
        $sellRoom->fill($request->all());
        $issetRequestImages =$request->file();
        $requestImages =$request->file('images');

        CreateUpdateImagesTrait::updateImages($images,$issetRequestImages,$requestImages);

        $sellRoom->save();

        event(new AddSellRoomEvent($sellRoom));
        return redirect()->route('home', ['id' => auth()->id()]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @param \App\Models\SellApartament $sellApartament
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sellRoom = SellApartament::findOrFail($id);
        $sellRoom->delete();
        return redirect()->route('home', ['id' => auth()->id()]);
    }

}
