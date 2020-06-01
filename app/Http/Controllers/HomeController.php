<?php

namespace App\Http\Controllers;

use App\Catalogo;
use Carbon\Carbon;
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
        $horaDia = Carbon::now()->hour;

        $catalogos = Catalogo::all();

        return view('home', compact(['horaDia', 'catalogos']));
    }
}
