<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exeption;
use Illuminate\Support\Facades\Redirect;

class CustomRegisterController extends Controller
{
    public function register(Request $r)
    {
        try {
            $usuario = new User([
                'name' => $r->name,
                'email' => $r->email,
                'password' => Hash::make($r->password),
                'tipo_usuario' => $r->tipoUsuario
            ]);
            $usuario->save();

            return redirect()->route('login')->with([
                'message' => 'Usuario registrado correctamente'
            ]);
        } catch (Exception $e) {
            return back()->with([
                'error' => 'Ha ocurrido un error al registrar el usuario'
            ]);
        }
    }
}
