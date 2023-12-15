<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{

    // VISTAS
    public function index()
    {
        $contacts = Contacto::where('user_id', auth()->user()->id)->get();
        return view('user-contactos-index');
    }

    public function create_view()
    {
        return view('user-contactos-create');
    }
    public function update_view(Request $request)
    {
        $contacto = Contacto::find($request->contacto_id);

        return view('user-contactos-update', [
            'contacto' => $contacto
        ]);
    }
}
