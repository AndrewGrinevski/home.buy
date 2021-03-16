<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use App\Models\SellApartament;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $a = 0;
        $b = 0;
        $c = 0;
        $id = Auth::id();
        $sellFlats = SellApartament::query()->where('contacts_id', '=', "{$id}")
            ->where('rent_per_month', '=', null)
            ->where('rent_per_day', '=', null)
            ->get();

        $rentFlatsPerDay = SellApartament::query()->where('contacts_id', '=', "{$id}")
            ->where('price', '=', null)
            ->where('rent_per_month', '=', null)
            ->get();

        $rentFlats = SellApartament::query()->where('contacts_id', '=', "{$id}")
            ->where('price', '=', null)
            ->where('rent_per_day', '=', null)
            ->get();

        return view('main.user.home', compact('sellFlats', 'rentFlatsPerDay', 'rentFlats', 'a', 'b', 'c'));
    }

    public function profile(){
        $user = Auth::user();
        return view('main.user.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->fill($request->all());
        $user->save();
        return redirect()->route('home', ['id' => auth()->id()]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
   /* public function update(AddFlatRequest $request, $id)
    {


        return redirect()->route('home', ['id' => auth()->id()]);
    }*/

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @param \App\Models\SellApartament $sellApartament
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
