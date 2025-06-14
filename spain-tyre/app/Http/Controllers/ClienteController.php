<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

// En este caso uso controlador porque el carrito es una entidad que se ve en varios lugares de la aplicación, no solo en una vista específica.
class ClienteController extends Controller
{
    /**
     * Actualiza los datos del cliente autenticado cuando los modifica.
     *
     * @return \Illuminate\View\View
     */
    public function actualizarDatos(Request $request)
    {
        $usuario = Auth::user();
        $cliente = $usuario->cliente;

        $request->validate([
            'dni' => [
                'required', 
                'regex:/^\d{8}[A-Z]$/i', 
                Rule::unique('clientes', 'dni')->ignore($cliente->id_cliente, 'id_cliente'),
            ],
            'calle' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'codigo_postal' => 'required|string|max:10',
            'localidad' => 'required|string|max:100',
            'provincia' => 'required|string|max:100',
        ], [
            'dni.regex' => 'El DNI debe tener 8 números seguidos de una letra (por ejemplo: 12345678A).',
            'dni.unique' => 'El DNI ya está registrado en otro cliente.'
        ]);
        
        $direccion = "{$request->calle}, {$request->numero}, {$request->codigo_postal}, {$request->localidad}, {$request->provincia}";

        $cliente->dni = $request->dni;
        $cliente->direccion = $direccion;
        $cliente->save();

        return redirect()->back()->with('success', 'Datos actualizados correctamente');
    }

}