<footer class="bg-white text-black dark:bg-gray-900 dark:text-white py-8 mt-8">    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-8">

            {{-- Columna izquierda --}}
            <div class="md:w-1/3">
                <h3 class="font-bold mb-2">Nuestra empresa</h3>
                <hr class="border-gray-700 mb-4">
                <ul class="space-y-1 text-sm">
                    <li>Envío</li>
                    <li>Aviso Legal</li>
                    <li>Términos y Condiciones</li>
                    <li>Sobre SpainTyre</li>
                    <li>Pago Seguro</li>
                </ul>
            </div>

            {{-- Columna derecha --}}
            <div class="md:w-1/3">
                <h3 class="font-bold mb-2">Contacto</h3>
                <hr class="border-gray-700 mb-4">
                <address class="not-italic text-sm space-y-1">
                    <div>Graintra Express SLU</div>
                    <div>P.I. Juncaril, Parc 218 - C/ Baza,</div>
                    <div>18220 Albolote (Granada)</div>
                    <div>Teléfono: <a href="tel:661278548" class="hover:underline">661278548</a></div>
                    <div>Email: <a href="mailto:preguntame@spaintyre.com" class="hover:underline">preguntame@spaintyre.com</a></div>
                </address>
            </div>
        </div>

        <div class="text-center text-sm text-black dark:text-white mt-8 pt-4 border-t border-gray-700 select-none">
            © {{ date('Y') }} Spain Tyre. Todos los derechos reservados.
        </div>

    </div>
</footer>
