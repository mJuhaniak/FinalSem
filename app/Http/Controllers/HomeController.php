<?php

namespace App\Http\Controllers;

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
        // ak chcem prejst na jednu zo stranok z tohto controllera, premseruje ma to najprv na login
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['name' => 'Úvod', 'info' => 'textÚvod']);
    }

    public function gallery()
    {
        return view('gallery', ['name' => 'Galéria', 'info' => 'textGaléria']);
    }

    public function calendar()
    {
        return view('calendar', ['name' => 'Kalendár', 'info' => 'textKalendár']);
    }

    public function info()
    {
        return view('info', ['name' => 'Info', 'info' => 'textInfo']);
    }
}
