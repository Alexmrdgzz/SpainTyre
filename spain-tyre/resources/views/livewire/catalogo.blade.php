<div class="w-full mx-auto px-4 py-6 bg-gray-300 dark:bg-gray-900 rounded-lg">
    <div class="flex flex-col lg:flex-row gap-4">
        {{-- FILTRO (izquierda en grande, arriba en móvil) --}}
        <div class="lg:w-1/5 w-full mt-15">
            <div class="p-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4 border-b border-gray-300 dark:border-gray-600 pb-2">Filtrar por</h2>
                <ul class="space-y-3 text-gray-600 dark:text-gray-400 text-sm">
                    <li>
                        <button
                            wire:click="$set('tipo', 'neumaticos')"
                            class="w-full text-left px-2 py-1 rounded hover:bg-blue-100 dark:hover:bg-blue-900 {{ $tipo === 'neumaticos' ? 'bg-blue-200 font-bold text-blue-900 dark:bg-blue-700 dark:text-blue-200' : '' }}"
                        >
                            Neumáticos
                        </button>

                        @if ($tipo === 'neumaticos')
                            <ul class="mt-2 ml-2 space-y-1 border-l border-gray-300 dark:border-gray-600 pl-3">
                                <li>
                                    <button
                                        wire:click="$set('vehiculo', null)"
                                        class="w-full text-left text-xs px-2 py-1 rounded hover:bg-blue-50 dark:hover:bg-blue-800 {{ $vehiculo === null ? 'underline font-semibold text-blue-800 dark:text-blue-300' : '' }}"
                                    >
                                        Todos
                                    </button>
                                </li>
                                <li>
                                    <button
                                        wire:click="$set('vehiculo', 'turismo')"
                                        class="w-full text-left text-xs px-2 py-1 rounded hover:bg-blue-50 dark:hover:bg-blue-800 {{ $vehiculo === 'turismo' ? 'underline font-semibold text-blue-800 dark:text-blue-300' : '' }}"
                                    >
                                        Turismos
                                    </button>
                                </li>
                                <li>
                                    <button
                                        wire:click="$set('vehiculo', 'camion')"
                                        class="w-full text-left text-xs px-2 py-1 rounded hover:bg-blue-50 dark:hover:bg-blue-800 {{ $vehiculo === 'camion' ? 'underline font-semibold text-blue-800 dark:text-blue-300' : '' }}"
                                    >
                                        Camiones
                                    </button>
                                </li>
                                <li>
                                    <button
                                        wire:click="$set('vehiculo', 'furgoneta')"
                                        class="w-full text-left text-xs px-2 py-1 rounded hover:bg-blue-50 dark:hover:bg-blue-800 {{ $vehiculo === 'furgoneta' ? 'underline font-semibold text-blue-800 dark:text-blue-300' : '' }}"
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
                            class="w-full text-left px-2 py-1 rounded hover:bg-blue-100 dark:hover:bg-blue-900 {{ $tipo === 'montajes' ? 'bg-blue-200 font-bold text-blue-900 dark:bg-blue-700 dark:text-blue-200' : '' }}"
                        >
                            Productos de Montaje
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        {{-- PRODUCTOS --}}
        <div class="lg:w-4/5 w-full">
            <h2 class="text-xl font-semibold mb-8 text-gray-900 dark:text-white">
                @if ($tipo === 'neumaticos')
                    @if ($vehiculo === 'turismo')
                        Neumáticos de Turismo
                    @elseif ($vehiculo === 'camion')
                        Neumáticos de Camión
                    @elseif ($vehiculo === 'furgoneta')
                        Neumáticos de Furgoneta
                    @else
                        Todos los Neumáticos
                    @endif
                @elseif ($tipo === 'montajes')
                    Productos de Montaje
                @else
                    Artículos
                @endif
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($articulos as $articulo)
                    <a href="{{ route('articulos.show', $articulo->id) }}" class="block bg-white dark:bg-gray-800 rounded-xl shadow hover:shadow-md transition p-4 flex flex-col h-full">
                        <img src="{{ $articulo->url_imagen }}" alt="{{ $articulo->nombre }}" class="h-40 object-contain mb-4 mx-auto">

                        <div class="mb-2 text-center">
                            <h3 class="text-base font-semibold text-gray-800 dark:text-gray-200 truncate">{{ $articulo->nombre }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $articulo->marca ?? '' }}</p>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 line-clamp-3">{{ $articulo->descripcion }}</p>
                        </div>

                        <div class="mt-auto flex justify-start items-center">
                            <span class="font-bold text-lg text-green-600 dark:text-green-400">
                                {{ number_format($articulo->precio, 2) }}€
                                @if($articulo->stock === 0)
                                    <span class="text-red-600 font-semibold text-sm ml-2">(Agotado)</span>
                                @endif
                            </span>
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
