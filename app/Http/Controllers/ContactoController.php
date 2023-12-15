<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{

    // VISTAS
    public function index(Request $request)
    {
        $contactos = Contacto::where('user_id', auth()->user()->id)->get();
        // return dd($contactos);
        return view('user_contactos_index', compact('contactos'));
    }

    public function create_view(Request $request)
    {
        return view('user_contactos_create');
    }
    public function update_view(Request $request)
    {
        $contacto = Contacto::find($request->contacto_id);

        return view('user_contactos_update', [
            'contacto' => $contacto
        ]);
    }
}
