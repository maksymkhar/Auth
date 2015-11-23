<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class ApiController extends Controller
{
    public function checkEmailExists(Request $request)
    {
        //$email = Input::get('email');

        $email = $request->get('email');

        \Debugbar::info("Requested email: " . $email);

        //TODO check email in DB.
        if ($this->checkEmail($email))
        {
            return "true";
        }
        else
        {
            return "false";
        }
    }

    private function checkEmail($email)
    {
        $user = User::where('email', $email)->first();

        if ($user ==  null)
        {
            return true;
        }

        return false;
    }
}
