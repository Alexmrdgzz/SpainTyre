<div class="container mx-auto px-4 py-6">
    <div class="flex flex-col lg:flex-row gap-4">
        
        {{-- FILTRO (izquierda en grande, arriba en móvil) --}}
        <div class="lg:w-1/5 w-full">
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                <h2 class="text-lg font-semibold text-gray-700 mb-4 border-b pb-2">Filtrar por</h2>

                <ul class="space-y-3 text-gray-600 text-sm">
                    <li>
                        <button
                            wire:click="$set('tipo', 'neumaticos')"
                            class="w-full text-left px-2 py-1 rounded hover:bg-blue-100 {{ $tipo === 'neumaticos' ? 'bg-blue-200 font-bold text-blue-900' : '' }}"
                        >
                            Neumáticos
                        </button>

                        @if ($tipo === 'neumaticos')
                            <ul class="mt-2 ml-2 space-y-1 border-l border-gray-300 pl-3">
                                <li>
                                    <button
                                        wire:click="$set('vehiculo', null)"
                                        class="w-full text-left text-xs px-2 py-1 rounded hover:bg-blue-50 {{ $vehiculo === null ? 'underline font-semibold text-blue-800' : '' }}"
                                    >
                                        Todos
                                    </button>
                                </li>
                                <li>
                                    <button
                                        wire:click="$set('vehiculo', 'turismo')"
                                        class="w-full text-left text-xs px-2 py-1 rounded hover:bg-blue-50 {{ $vehiculo === 'turismo' ? 'underline font-semibold text-blue-800' : '' }}"
                                    >
                                        Turismos
                                    </button>
                                </li>
                                <li>
                                    <button
                                        wire:click="$set('vehiculo', 'camion')"
                                        class="w-full text-left text-xs px-2 py-1 rounded hover:bg-blue-50 {{ $vehiculo === 'camion' ? 'underline font-semibold text-blue-800' : '' }}"
                                    >
                                        Camiones
                                    </button>
                                </li>
                                <li>
                                    <button
                                        wire:click="$set('vehiculo', 'furgoneta')"
                                        class="w-full text-left text-xs px-2 py-1 rounded hover:bg-blue-50 {{ $vehiculo === 'furgoneta' ? 'underline font-semibold text-blue-800' : '' }}"
                                    >
                                        Furgonetas
                                    </button>
                                </li>
                            </ul>
                        @endif
                    </li>

                    <li>
                        <button
                            wire:click="$set('tipo', 'montajes')"
                            class="w-full text-left px-2 py-1 rounded hover:bg-blue-100 {{ $tipo === 'montajes' ? 'bg-blue-200 font-bold text-blue-900' : '' }}"
                        >
                            Productos de Montaje
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        {{-- PRODUCTOS --}}
        <div class="lg:w-4/5 w-full">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($articulos as $articulo)
                    <a href="{{ route('articulos.show', $articulo->id) }}" class="block bg-white rounded-xl shadow hover:shadow-md transition p-4 flex flex-col h-full">
                        <img src="{{ $articulo->url_imagen }}" alt="{{ $articulo->nombre }}" class="h-40 object-contain mb-4 mx-auto">

                        <div class="mb-2 text-center">
                            <h3 class="text-base font-semibold text-gray-800 truncate">{{ $articulo->nombre }}</h3>
                            <p class="text-sm text-gray-500">{{ $articulo->marca ?? '' }}</p>
                        </div>

                        <p class="text-gray-600 text-sm mb-3 line-clamp-3">{{ $articulo->descripcion }}</p>

                        <div class="mt-auto flex justify-between items-center">
                            <span class="text-red-600 font-bold text-lg">{{ number_format($articulo->precio, 2) }}€</span>
                            <div class="flex items-center gap-2">
                                <select class="border rounded px-2 py-1 text-sm bg-white text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-300">
                                    <option value="1">1</option>
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                <button class="bg-blue-500 text-white rounded-full p-2 hover:bg-blue-600">
                                    +
                                </button>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- Paginación --}}
            <div class="mt-6">
                {{ $articulos->links() }}
            </div>
        </div>
    </div>
</div>
