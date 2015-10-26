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
        \Debugbar::info("postLogin");


        $email = $request->get("email");
        $password = $request->get("password");

        echo $email;
        echo $password;
    }

    public function getLogin()
    {
        \Debugbar::info("getLogin");
        return view('login');
    }
}
