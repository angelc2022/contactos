<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    Route::get('/', [AuthController::class, 'redirect_to_login'])->name('redirect_to_login');
    Route::get('/Signin', [AuthController::class, 'user_register_index'])->name('user_register_index');
    Route::get('/Signup', [AuthController::class, 'user_register_create'])->name('user_register_create');
});

route::group(['middleware' => 'guest'], function () {
    Route::post('/Signin', [AuthController::class, 'user_register_index_post'])->name('user_register_index_post');
    Route::post('/Signup', [AuthController::class, 'user_register_create_post'])->name('user_register_create_post');
    route::post('printer', function () {
        return dump(request()->all());
    })->name('printer-post');
});

// logeado
route::group(['middleware' => 'auth'], function () {

    Route::get('/', function(){
        return to_route('user-contactos-index');
    })->name('redirect_to_index');

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
    Route::post('/Logout', [AuthController::class, 'user_register_logout'])->name('user_register_logout');
    
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
