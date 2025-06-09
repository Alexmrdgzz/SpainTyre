<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Carrito;
use App\Models\DetalleCarrito;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{

    /**
     * Agrega un artículo al carrito del cliente.
     *
     * @param Request $request
     * @param int $id ID del artículo a agregar.
     * @return Devuelve al usuario a la página actual con un mensaje de éxito o error.
     */
    public function agregar(Request $request, $id)
    {
        // Validar que el usuario está autenticado y es un cliente
        $usuario = Auth::user();
        if (!$usuario || !$usuario->cliente) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión como cliente para añadir al carrito.');
        }

        //Obtener el cliente, su carrito y el artículo a añadir
        $cliente = $usuario->cliente;
        $carrito = $cliente->carrito;
        $articulo = Articulo::findOrFail($id);
    
        // Buscar si el artículo ya está en el carrito
        $detalle = DetalleCarrito::where('id_carrito', $carrito->id_carrito)
            ->where('id_articulo', $articulo->id)
            ->first();

        if ($detalle) {
            // Si el artículo ya está en el carrito, se actualiza la cantidad
            // No uso save porque no funciona bien con las claves compuestas y lo hago manualmente.
            DetalleCarrito::where('id_carrito', $carrito->id_carrito)
                ->where('id_articulo', $articulo->id)
                // Utiliza el valor de uno por defecto si no se proporciona cantidad
                ->update(['cantidad' => $detalle->cantidad + $request->input('cantidad', 1)]);
        } else {
            // Si el artículo no está en el carrito, se crea una nueva entrada
            DetalleCarrito::create([
                'id_carrito' => $carrito->id_carrito,
                'id_articulo' => $articulo->id,
                'cantidad' => $request->input('cantidad', 1)
            ]);
        }

        // Redirigir al usuario a la página actual con un mensaje de éxito
        return back()->with('success', 'Artículo añadido al carrito.');
    }
}
