<?php

namespace App\Http\Controllers;
use App\Models\Contacto;
use App\Models\User;
use Illuminate\Http\Request;

class ContactoController extends Controller
{

    // VISTAS
    public function index(Request $request)
    {
        $contactos = Contacto::where('user_id', auth()->user()->id)->paginate(10);
        $grupos = [
            ['id' => 1, 'nombre' => 'Casa'],
            ['id' => 2, 'nombre' => 'Trabajo'],
            ['id' => 3, 'nombre' => 'Familia'],
            ['id' => 4, 'nombre' => 'Otro']
        ];
        return view('user_contactos_index', compact('contactos', 'grupos'));
    }

    public function create_view(Request $request)
    {
        $grupos = [
            ['id' => 1, 'nombre' => 'Casa'],
            ['id' => 2, 'nombre' => 'Trabajo'],
            ['id' => 3, 'nombre' => 'Familia'],
            ['id' => 4, 'nombre' => 'Otro']
        ];
        return view('user_contactos_create', compact('grupos'));
    }
    public function update_view(Request $request)
    {
        $contacto = Contacto::where('id', $request->contacto_id)->first();
        $grupos = [
            ['id' => 1, 'nombre' => 'Casa'],
            ['id' => 2, 'nombre' => 'Trabajo'],
            ['id' => 3, 'nombre' => 'Familia'],
            ['id' => 4, 'nombre' => 'Otro']
        ];
        // return dump($contacto);
        return view('user_contactos_update', [
            'contacto' => $contacto,
            'grupos' => $grupos,
        ]);
    }

    public function contactos_create_post(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:2|max:30|unique:contactos,nombre,' . auth()->user()->id . ',user_id',
            'apellido' => 'nullable|min:2|max:30',
            'telefono' => 'required|min:7|max:15|unique:contactos,telefono,' . auth()->user()->id . ',user_id',
            'email' => 'required|email|unique:contactos,email,' . auth()->user()->id . ',user_id',
            'direccion' => 'nullable',
            'select_grupo' => 'nullable',
        ]);

        try {
            $contacto = new Contacto;
            $contacto->nombre = $request->nombre;
            $contacto->apellido = $request->apellido;
            $contacto->telefono = $request->telefono;
            $contacto->email = $request->email;
            $contacto->telefono = $request->telefono;
            $contacto->direccion = $request->direccion;
            $contacto->grupo_id = $request->select_grupo;
            $contacto->user_id = auth()->user()->id;

            $contacto->save();
            return to_route('user_contactos_index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function contactos_update_post(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:2|max:30|unique:contactos,nombre,' . auth()->user()->id . ',user_id',
            'apellido' => 'nullable|min:2|max:30',
            'telefono' => 'required|min:7|max:15|unique:contactos,telefono,' . auth()->user()->id . ',user_id',
            'email' => 'required|email|unique:contactos,email,' . auth()->user()->id . ',user_id',
            'direccion' => 'nullable',
            'select_grupo' => 'nullable',
        ]);

        try {
            $contacto = Contacto::where('id', $request->contacto_id)->first();
            $contacto->nombre = $request->nombre;
            $contacto->apellido = $request->apellido;
            $contacto->telefono = $request->telefono;
            $contacto->email = $request->email;
            $contacto->direccion = $request->direccion;
            $contacto->grupo_id = $request->select_grupo;

            $contacto->save();
            return to_route('user_contactos_index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function contactos_destroy_post(Request $request)
    {
        try {
            $contacto_to_delete = Contacto::where('id', $request->contacto_id)->first();
            $contacto_to_delete->delete();
            return to_route('user_contactos_index');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
