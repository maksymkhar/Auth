<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class LoginController extends Controller
{
    public function postLogin(Request $request)
    {
        //TODO

        $email = $request->get("email");
        $password = $request->get("password");

        \Debugbar::info($email . "|" . $password);

        echo "test";

        if ($this->login($email, $password))
        {
            //TODO: redirect to home.
            return redirect()->route('auth.home');
        }
        else
        {
            //TODO: redirect back.
            return redirect()->route('auth.getLogin');
        }

    }

    public function getLogin()
    {
        return view('login');
    }

    private function login($email, $password)
    {
        //TODO: Mirar a la DB.
        return false;
    }
}
