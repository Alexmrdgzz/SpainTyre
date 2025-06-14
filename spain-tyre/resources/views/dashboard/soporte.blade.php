@extends('dashboard.index')
@section('contenido')
<h1 class="text-2xl font-bold mb-4">💬 Soporte</h1>
<p class="mb-4">¿Necesitas ayuda? Aquí puedes resolver dudas y reportar problemas técnicos.</p>

<div class="w-full bg-white dark:bg-gray-800 rounded-lg p-6 shadow-md border border-gray-300 dark:border-gray-700">
    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-200 mb-3">Datos de Contacto</h2>
    
    <ul class="mb-6 text-gray-800 dark:text-gray-300 space-y-2">
        <li><strong>Teléfono:</strong> <a href="tel:+34661278548" class="text-blue-600 hover:underline">+34 661 27 85 48</a></li>
        <li><strong>Email:</strong> <a href="mailto:preguntame@spaintyre.com" class="text-blue-600 hover:underline">preguntame@spaintyre.com</a></li>
        <li><strong>Horario de atención:</strong> Lunes a Viernes, 9:00 - 18:00</li>
    </ul>

    <a href="https://api.whatsapp.com/send?phone=34661278548&text=Hola%20SpainTyre%2C%20necesito%20soporte" target="_blank" 
        class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded shadow transition-colors duration-200">
        💬 Contactar por WhatsApp
    </a>
</div>
@endsection