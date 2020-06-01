<?php

namespace App\Http\Controllers;

use App\Pago;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->tipo_usuario == 1) {
            $pagos = $user->pagosVendedor()->where('estado', '=', '0')->get();
        } else {
            $pagos = $user->pagosCliente;
        }

        return view('pagos.indexVendedor', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Auth::user()->clientes;
        return view('pagos.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $fechaMax = Carbon::createFromFormat('M d, Y', $r->fecha_max);

        $pago = new Pago([
            'monto' => $r->monto,
            'desc' => $r->desc,
            'cliente_id' => Auth::user()->tipo_usuario == 1 ? $r->cliente : Auth::user()->id,
            'vendedor_id' => Auth::user()->tipo_usuario == 1 ? Auth::user()->id : Auth::user()->vendedor->id,
            'prox_fecha' => $fechaMax,
            'estado' => 0
        ]);

        $pago->save();

        return back()->with([
            'message' => 'Se ha notificado a ' . $pago->cliente->name . ' que tiene un pago pendiente'
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
