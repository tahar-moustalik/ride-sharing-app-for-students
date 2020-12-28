<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClasses;

require 'CustomClasses/Autoloader';
class InscController extends Controller
{
    public function matchPassword($pass, $cpass)
    {
        if ($pass == $cpass) {
            inscription($login, $pass, $email);
        }
    }
    public function inscription($login, $pass, $email)
    {
        $new_user = new Utilisateur($login, $pass, $email);
    }
}
