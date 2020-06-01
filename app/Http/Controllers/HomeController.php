<?php

namespace App\Http\Controllers;

use App\Catalogo;
use App\Notificacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $nNotificaciones = Notificacion::where('user_id', '=', Auth::user()->id)->where('leida', '=', false)->count();

        $horaDia = Carbon::now()->hour;
        if (Auth::user()->tipo_usuario == 1) {
            $catalogos = Catalogo::where('vendedor_id', '=', Auth::user()->id)->get();

        } else {
            $catalogos = Auth::user()->vendedor->catalogos;
        }

        return view('home', compact(['horaDia', 'catalogos', 'nNotificaciones']));


    }
}
