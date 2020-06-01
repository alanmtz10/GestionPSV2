<?php

namespace App\Http\Controllers;

use App\Catalogo;
use App\Notificacion;
use App\Pago;
use App\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidosController extends Controller
{
    public function index()
    {
        $user = Auth::user()->tipo_usuario;
        if ($user == 1) {
            $pedidos = Pedido::where('vendedor_id', '=', Auth::user()->id)->where('status', '=', 0)->get();

        } else {
            $pedidos = Pedido::where('cliente_id', '=', Auth::user()->id)->get();
        }

        return view('pedidos.indexVendedor', compact('pedidos'));
    }

    public function create(Request $r)
    {
        $catalogo = null;
        if ($r->has('cat')) {
            $catalogo = Catalogo::find($r->cat);
        }
        $clientes = Auth::user()->clientes;
        return view('pedidos.create', compact(['clientes', 'catalogo']));
    }

    public function store(Request $r)
    {
        $pedido = new Pedido([
            'marca' => $r->marca,
            'producto' => $r->producto,
            'cliente_id' => Auth::user()->tipo_usuario == 1 ? $r->cliente : Auth::user()->id,
            'vendedor_id' => Auth::user()->tipo_usuario == 1 ? Auth::user()->id : Auth::user()->vendedor->id,
            'cat_pag' => $r->page,
            'status' => 0
        ]);

        $pedido->save();

        $notificacion = new Notificacion([
            'desc' => $pedido->cliente->name . 'Se ha realizado un nuevo pedido',
            'user_id' => $pedido->vendedor_id,
            'notificable_type' => Pedido::class,
            'notificable_id' => $pedido->id,
            'leida' => false
        ]);

        $notificacion->save();

        return back()->with([
            'message' => 'Pedido registrado correctamente'
        ]);
    }
}
