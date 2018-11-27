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
    /* ->with(['storagepath' => Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix()]); */
})->name('session');

Route::get('/loginuser', function () {
    if (Auth::guest()){
        return view('pages.login');
    }else{
        return redirect('/');
    }
});

Route::get('/forgotpassword', function () {
    if (Auth::guest()){
        return view('pages.forgotpassword');
    }else{
        return redirect('/');
    }
});

Route::get('/signup', function () {
    if (Auth::guest()){
        return view('pages.signup');
    }else{
        return redirect('/');
    }
});

Route::get('/signup/termsofservices', function () {
    return view('pages.termsofservices');
});

Route::get('/myprofile', function () {
    return view('pages.myprofile');
});

Route::get('/userimage/{filename}', 'UserAccntController@getUserImg')->name('account.image');
Route::get('/contacts/{authid}', 'ContactController@index')->name('contactpage');
Route::get('/home', 'HomeController@index');

Route::post('/loginuser', 'UserAccntController@login')->name('user.login');

Route::resource('/users', 'UserAccntController');
Route::resource('/contacts', 'ContactController');
Route::auth();
