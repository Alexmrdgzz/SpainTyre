<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Carrito;
use App\Models\DetalleCarrito;
use Illuminate\Support\Facades\Auth;

// En este caso uso controlador porque el carrito es una entidad que se ve en varios lugares de la aplicación, no solo en una vista específica.
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

        $cantidadSolicitada = $request->input('cantidad', 1);

        // Buscar si el artículo ya está en el carrito
        $detalle = DetalleCarrito::where('id_carrito', $carrito->id_carrito)
            ->where('id_articulo', $articulo->id)
            ->first();

        $cantidadEnCarrito = $detalle ? $detalle->cantidad : 0;
        $cantidadTotal = $cantidadEnCarrito + $cantidadSolicitada;

        if ($cantidadTotal > $articulo->stock) {
            return back()->with('error', 'No puedes añadir más unidades de las disponibles en stock.');
        }

        if ($detalle) {
            // Si el artículo ya está en el carrito, se actualiza la cantidad
            // No uso save() porque no funciona bien con las claves compuestas y lo hago manualmente.
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

    /**
     * Muestra el contenido del carrito del cliente.
     * Devuelve el atributo calculado del total y los articulos.
     * @return Vista del carrito con los detalles de los artículos y el total.
     */
    public function verCarrito()
    {
        $cliente = Auth::user()->cliente;
        $carrito = $cliente->carrito;
        $detalles = $carrito->detalles()->with('articulo')->get();
        $subtotal = 0;

        foreach ($detalles as $detalle) {
            $cantidad = $detalle->cantidad;
            $precioConIVA = $detalle->articulo->precio;

            // Calcula precio sin IVA (21%)
            $precioSinIVA = $precioConIVA / 1.21;

            // Calcula el subtotal
            $subtotal += $precioSinIVA * $cantidad;
        }
        
        $iva = $subtotal * 0.21;

        if ($detalles->isEmpty()) {
            $gastosEnvio = 0;
        } else {
            $gastosEnvio = $subtotal >= 200 ? 0 : 12.99;
        }

        $total = $subtotal + $iva + $gastosEnvio;
        
        /*
            Como esta vista no está gestionada desde un componente Livewire, si no que se hace desde un controlador tradicional
            tengo que poner en la plantilla de la vista el extends y el section de content
            para que se muestre correctamente.
        */
        return view('carrito.ver-carrito', compact('detalles', 'subtotal', 'iva', 'gastosEnvio', 'total'));
    }

    public function eliminarDetalle($carritoId, $articuloId)
    {
        // Hay que borrarlo asi porque la clave primaria es compuesta y no se puede usar el método delete() directamente.
        DetalleCarrito::where('id_carrito', $carritoId)
            ->where('id_articulo', $articuloId)
            ->delete();

        return redirect()->back()->with('success', 'Artículo eliminado del carrito correctamente.');
    }

}
