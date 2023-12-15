<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // VISTAS
    public function redirect_to_login(Request $request)
    {
        return to_route('user_register_index');
    }

    public function user_register_index(Request $request)
    {
        return view('user_register_index');
    }
    public function user_register_create(Request $request)
    {
        return view('user_register_create');
    }

    // POST

    public function user_register_create_post(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:30|unique:users,name',
            'email' => 'required|string|email|max:50|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
        $request->password = Hash::make($request->password);
        $credentials = $request->only('name', 'email', 'password');
        $user = User::create($credentials);
        Auth::login($user);
        $request->session()->regenerate();
        return to_route('user_contactos_index');
    }
    public function user_register_index_post(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|min:8',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return to_route('user_contactos_index');
        } else {
            return redirect()->back()->with('error', 'Email or password incorrect');
        }

    }

    public function user_register_logout(Request $request, Redirector $redirect)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return to_route('user_register_index');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Error al cerrar sesion');
        }

    }
}
