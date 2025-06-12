<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
 {
    public function inicio()
    {
        $cliente = Auth::user()->cliente;

        $totalPedidos = $cliente->pedidos()->count();

        $ultimoPedido = $cliente->pedidos()->latest('created_at')->first();

        $totalGastado = $cliente->pedidos()->sum('total');

        return view('dashboard.inicio-panel', compact('totalPedidos', 'ultimoPedido', 'totalGastado'));
    }

    public function mostrarPedidos()
    {
        // Devuelve todos los pedidos del cliente autenticado, ordenados por fecha de creación
        $cliente = Auth::user()->cliente;
        $pedidos = $cliente->pedidos()->with('detalles')->orderBy('created_at', 'desc')->get();

        return view('dashboard.mostrar-pedidos', compact('pedidos'));
    }

    public function datosCliente()
    {
        $cliente = Auth::user()->cliente;

        return view('dashboard.datos-cliente', compact('cliente'));
    }
 } 