<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function test(){
        return view('site.test', [
            'isActive' => true,
            'message1' => 'hello World',
            'message2' => 'Good Buy'
        ]);
    }
}
