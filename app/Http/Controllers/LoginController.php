<?php

namespace App\Http\Controllers;

use App\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{
    /**
     * Login HTTP POST
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

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
            $request->session()->flash('login_error', 'Login error.');
            return redirect()->route('auth.getLogin');
        }
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {
        return view('login');
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    private function login($email, $password)
    {
        //$user = User::findOrFail(id);

        $user = User::where('email', $email)->first();

        if ($user == null) return false;


        //if (Hash::check($password, $user->password)) {
        if (Hash::check($password, $user->password)) {
            return true;
        }
        else
        {
            return false;
        }
    }
}
