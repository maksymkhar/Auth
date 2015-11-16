<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function getRegister()
    {
        return view('register');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function postRegister(Request $request)
    {
        //dd(Input::all());

        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->name = $request->get('name');
        $user->email =$request->get('email');
        $user->password =  bcrypt($request->get('password'));

        $user->save();

        //User::create(Input::all());
        //User::create($request->all());


        return redirect(route('auth.getLogin'));
    }
}
