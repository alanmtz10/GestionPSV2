<?php

namespace App\Http\Controllers;

use App\Notificacion;
use App\Pago;
use App\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionesController extends Controller
{
    public function index()
    {
        $params = [];

        $notificacionesLeidas = Notificacion::where('leida', '=', true)->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $notificacionesNoLeidas = Notificacion::where('leida', '=', false)->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        if (!$notificacionesNoLeidas->isEmpty()) {
            array_push($params, 'notificacionesNoLeidas');
        }
        if (!$notificacionesLeidas->isEmpty()) {
            array_push($params, 'notificacionesLeidas');
        }

        return view('notificaciones.index', compact($params));
    }

    public function show($id)
    {
        $notificacion = Notificacion::find($id);
        $notificacion->leida = true;
        $notificacion->save();

        if ($notificacion->notificable_type == Pago::class) {
            return redirect()->route('pago.index');
        } else if ($notificacion->notificable_type == Pedido::class) {
            return redirect()->route('pedidos.index');
        }

    }
}
