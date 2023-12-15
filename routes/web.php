<?php

use App\Http\Controllers\ContactoController;
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
    route::post('printer/post', function () {
        return dump(request()->all());
    })->name('printer_post');
    route::get('printer/get', function () {
        return dump(request()->all());
    })->name('printer_get');

    Route::get('/', function () {
        return to_route('user_contactos_index');
    })->name('redirect_to_index');

    route::get('/user/contactos/index', [ContactoController::class, 'index'])->name('user_contactos_index');

    route::POST('/user/contactos/create', [ContactoController::class, 'create_view'])->name('user_contactos_create');

    route::POST('/user/contactos/update', [ContactoController::class, 'update_view'])->name('user_contactos_update');
});

route::group(['middleware' => 'auth'], function () {
    Route::post('/Logout', [AuthController::class, 'user_register_logout'])->name('user_register_logout');

    route::post('/user/contactos/create/post',[ContactoController::class, 'contactos_create_post'])->name('contactos_create_post');

    route::post('/user/contactos/update/post', [ContactoController::class, 'contactos_update_post'])->name('contactos_update_post');

    route::post('/user/contactos/destroy/post',[ContactoController::class, 'contactos_destroy_post'])->name('contactos_destroy_post');
});
