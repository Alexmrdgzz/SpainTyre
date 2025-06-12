<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\Carrito;
use App\Models\DetalleCarrito;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function realizar(Request $request)
    {
        DB::beginTransaction();

        try {
            $cliente = Auth::user()->cliente;

            // Obtener el carrito del cliente
            $carrito = $cliente->carrito;

            // Obtener los detalles del carrito
            $detalles = $carrito->detalles;

            if ($detalles->isEmpty()) {
                return redirect()->back()->with('error', 'Tu carrito está vacío.');
            }
            
            $totalArticulos = 0;

            // Calcular el total de los artículos en el carrito
            foreach ($detalles as $detalle) {
                $totalArticulos += $detalle->articulo->precio * $detalle->cantidad;
            }

            // Cálculo del envío
            $envio = $totalArticulos >= 200 ? 0 : 12.99;

            // Total final del pedido
            $totalFinal = $totalArticulos + $envio;

            // Crear el pedido
            $pedido = Pedido::create([
                'id_cliente' => $cliente->id_cliente,
                'fecha_pedido' => Carbon::now(),
                'total' => $totalFinal,
            ]);
            
            // Crear los detalles del pedido
            foreach ($detalles as $detalle) {
                DetallePedido::create([
                    'id_pedido' => $pedido->id,
                    'id_articulo' => $detalle->id_articulo,
                    'cantidad' => $detalle->cantidad,
                    'precio_unitario' => $detalle->articulo->precio,
                ]);
            }

            // Actualizar stock del artículo restando la cantidad pedida
            $articulo = $detalle->articulo;
            $articulo->stock -= $detalle->cantidad;
            $articulo->save();

            // Vaciar el carrito
            $carrito->detalles()->delete();

            DB::commit();

            return redirect()->route('home')->with('success', 'Pedido realizado con éxito.');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Error al procesar el pedido.');
        }
    }
    
}
