<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCatalogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CatalogosController extends Controller
{
    public function create()
    {
        return view('catalogos.create');
    }

    public function store(StoreCatalogo $r)
    {
        $filesPath = "/public/catalogos/";
        !file_exists($filesPath) ? mkdir($filesPath, 0777, true) : null;
        $r->file('catalogoPDF')->store("app/public/catalogos/");

        return response([], 200);
    }
}
