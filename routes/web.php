<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// no logeado
route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return to_route('user-register-index');
    });
    Route::get('/Signin', function () {
        return view('user-register-index');
    })->name('user-register-index');
    Route::get('/Signup', function () {
        return view('user-register-create');
    })->name('user-register-create');
    route::post('printer', function () {
        return dump(request()->all());
    })->name('printer-post');
});

// logeado
route::group(['middleware' => 'auth'], function () {

    route::get('/user/contactos/index', function () {
        return view('user-contactos-index');
    })->name('user-contactos-index');
    
    route::get('/user/contactos/create', function () {
        return view('user-contactos-create');
    })->name('user-contactos-create');

    route::get('/user/contactos/update', function () {
        return view('user-contactos-update');
    })->name('user-contactos-update');
});

route::group(['middleware' => 'auth'], function () {

    route::post('/user/contactos/create/post', function () {
        return view('contactos-create-post');
    })->name('contactos-create-post');

    route::post('/user/contactos/update/post', function () {
        return view('contactos-update-post');
    })->name('contactos-update-post');

    route::post('/user/contactos/destroy/post', function () {
        return dump(request()->all());
    })->name('contactos-destroy-post');
});
