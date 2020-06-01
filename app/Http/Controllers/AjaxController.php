<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function verifyExistUser($email)
    {
        $user = User::where('email', '=', $email)->first();

        return $user;
    }
}
