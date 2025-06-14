<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
 {
    /**
     * Muestra el panel de inicio del dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function inicio()
    {
        $cliente = Auth::user()->cliente;

        // Variables para las estadisticas del panel de inicio
        $totalPedidos = $cliente->pedidos()->count();

        $ultimoPedido = $cliente->pedidos()->latest('created_at')->first();

        $totalGastado = $cliente->pedidos()->sum('total');

        return view('dashboard.inicio-panel', compact('totalPedidos', 'ultimoPedido', 'totalGastado'));
    }

    /**
     * Muestra los pedidos del cliente autenticado.
     *
     * @return \Illuminate\View\View
     */
    public function mostrarPedidos()
    {
        // Devuelve todos los pedidos del cliente autenticado, ordenados por fecha de creación
        $cliente = Auth::user()->cliente;
        $pedidos = $cliente->pedidos()->with('detalles')->orderBy('created_at', 'desc')->get();

        return view('dashboard.mostrar-pedidos', compact('pedidos'));
    }

    /**
     * Muestra los datos del cliente autenticado.
     *
     * @return \Illuminate\View\View
     */
    public function datosCliente()
    {
        $cliente = Auth::user()->cliente;

        $direccion = [
            'calle' => '',
            'numero' => '',
            'codigo_postal' => '',
            'localidad' => '',
            'provincia' => '',
        ];

        if ($cliente && $cliente->direccion) {
            $partes = explode(',', $cliente->direccion);
            if (count($partes) === 5) {
                $direccion = [
                    'calle' => $partes[0],
                    'numero'=> $partes[1],
                    'codigo_postal' => $partes[2],
                    'localidad' => $partes[3],
                    'provincia' => $partes[4],
                ];
            }
        }

        return view('dashboard.datos-cliente', compact('cliente', 'direccion'));
    }

 } 