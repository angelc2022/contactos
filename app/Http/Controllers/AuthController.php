<?php

namespace App\Http\Controllers;

use app\Models\User;
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
        return view('user-register-index');
    }
    public function user_register_create(Request $request)
    {
        return view('user-register-create');
    }

    // POST

    public function user_register_create_post(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:30|unique:users,name',
            'email' => 'required|string|email|max:50|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('name', 'email', 'password');

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            
            Auth::login($user);
            return to_route('user-contactos-index');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Error al crear el usuario');
        }
    }
    public function user_register_index_post(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|min:8',
        ]);
        $credentials = $request->only('email', 'password');
        return dump($credentials);
    }

    public function user_register_logout(Request $request)
    {
        Auth::logout();
        return redirect()->back()->with('success', 'Logout successfully');
    }
}
