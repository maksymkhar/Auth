<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', ['as' => 'auth.home', function () {
    return view('home');
}]);

Route::get('/login', [
    'as' => 'auth.getLogin',
    'uses' => 'LoginController@getLogin'] );

Route::post('/postLogin', [
    'as' => 'auth.postLogin',
    'uses' => 'LoginController@postLogin']);

Route::get('/resource', function () {

    $authenticated = false;

    //Session::set('authenticated', false);

    if (Session::has('authenticated'))
    {
        if (Session::get('authenticated'))
        {
            $authenticated = true;
        }
    }

    if ($authenticated)
    {
        return view('resource');
    }
    else
    {
        return redirect()->route('auth.getLogin');
    }

});

Route::get('/flushSession', function () {
    Session::flush();
});