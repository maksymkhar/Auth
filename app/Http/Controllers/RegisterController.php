<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use stdClass;


class RegisterController extends Controller
{
    protected $email;
    protected $name;

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

        $this->email = $user->email;
        $this->name = $user->name;

        $this->sendRegiserEmail();

        return redirect(route('auth.getLogin'));
    }

    public function sendRegiserEmail()
    {
        $emailData = new stdClass();

        $emailData->email = $this->email;
        $emailData->name = $this->name;
        $emailData->subject = "Welcome user " . $this->name;

        $data['name'] = $this->name;

        \Mail::queue('emails.message', $data, function ($message) use ($emailData) {

            $message->from(env('CONTACT_MAIL'), env('CONTACT_NAME'));
            $message->to($emailData->email, $emailData->name);
            $message->subject($emailData->subject);
        });
    }
}
