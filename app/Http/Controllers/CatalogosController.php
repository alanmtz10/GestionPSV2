<?php

namespace App\Http\Controllers;

use App\Catalogo;
use App\Http\Requests\StoreCatalogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CatalogosController extends Controller
{
    public function create()
    {
        return view('catalogos.create');
    }

    public function store(StoreCatalogo $r)
    {
        $filesPath = storage_path('/public/catalogos');
        !file_exists($filesPath) ? mkdir($filesPath, 0777, true) : null;
        $fileName = $r->file('catalogoPDF')->store('public/catalogos');


        if ($fileName == false) {
            return response([], 500);
        } else {
            $fileName = explode('/', $fileName);
            $catalogo = new Catalogo([
                'nombre' => $r->name,
                'marca' => $r->marca,
                'pdf_url' => $fileName[2],
                'vendedor_id' => Auth::user()->id
            ]);
            $catalogo->save();
        }

        return response('ok', 200);
    }

    public function show($id)
    {
        $catalogo = Catalogo::find($id);

        return view('catalogos.show', compact('catalogo'));

    }
}
