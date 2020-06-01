<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidosController extends Controller
{
    public function create()
    {
        $clientes = Auth::user()->clientes;

        return view('pedidos.create', compact('clientes'));
    }

    public function store(Request $r)
    {
        (new Pedido([
            'marca' => $r->marca,
            'producto' => $r->producto,
            'cliente_id' => $r->cliente,
            'status' => 0
        ]))->save();

        return back()->with([
            'message' => 'Pedido registrado correctamente'
        ]);
    }
}
