<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Auth::user()->clientes;
        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(Request $r)
    {
        (new User([
            'name' => $r->name,
            'email' => $r->email,
            'tipo_usuario' => 2,
            'vendedor_id' => Auth::user()->id
        ]))->save();

        return back()->with([
            'message' => 'Cliente registrado correctamente.'
        ]);
    }
}
