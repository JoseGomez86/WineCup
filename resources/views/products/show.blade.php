<x-app-layout>
    <div>
        <div class="container-j py-8">
            <div class="sm:grid grid-cols-2 gap-6">
                {{-- Datos del producto para pantallas chicas --}}
                <div class="sm:hidden">
                    <h1 class="text-2xl font-bold text-gray-700">{{ $product->name }}</h1>
                    <div class="flex my-2">
                        <p class="mr-4">
                            <i class="fas fa-star text-sm text-yellow-400"></i>
                            <i class="fas fa-star text-sm text-yellow-400"></i>
                            <i class="fas fa-star text-sm text-yellow-400"></i>
                            <i class="fas fa-star text-sm text-yellow-400"></i>
                            <i class="fas fa-star text-sm text-yellow-400"></i>
                        </p>
                        <a href="" class="text-red-500 underline hover:text-red-700">42 opiniones</a>
                    </div>
                    <p class="my-2 text-xl font-semibold text-gray-700">Precio: ${{ $product->price }}</p>
                </div>
                {{-- Imagenes del producto --}}
                <div>
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach ($product->images as $image)
                                <li data-thumb="{{ Storage::url($image->url) }}">
                                    <img src="{{ Storage::url($image->url) }}" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                {{-- Datos del producto --}}
                <div>
                    @if ($product->statusproduct_id == 2)
                        <div class=" bg-red-500 rounded-lg shadow-lg p-4 text-2xl text-white font-semibold">
                            Producto discontinúo
                        </div>
                    @endif
                    @if ($product->statusproduct_id == 3)
                        <div class=" bg-orange-500 rounded-lg shadow-lg p-4 text-2xl text-white font-semibold">
                            Producto Pausado
                        </div>
                    @endif
                    @if ($product->statusproduct_id == 4)
                        <div class=" bg-yellow-500 rounded-lg shadow-lg p-4 text-2xl text-white font-semibold">
                            Producto Sin Stock
                        </div>
                    @endif
                    <div class="hidden sm:block">
                        <h1 class="text-2xl font-bold text-gray-700">{{ $product->name }}</h1>
                        <div class="flex my-2">
                            <p class="mr-4">
                                <i class="fas fa-star text-sm text-yellow-400"></i>
                                <i class="fas fa-star text-sm text-yellow-400"></i>
                                <i class="fas fa-star text-sm text-yellow-400"></i>
                                <i class="fas fa-star text-sm text-yellow-400"></i>
                                <i class="fas fa-star text-sm text-yellow-400"></i>
                            </p>
                            <a href="" class="text-red-500 underline hover:text-red-700">42 opiniones</a>
                        </div>
                        <p class="my-2 text-xl font-semibold text-gray-700">Precio: ${{ $product->price }}</p>
                    </div>

                    {{-- tarjeta envio y formas de envío --}}
                    @if ($product->statusproduct_id == 1)
                        <div class="bg-white rounded-lg shadow-lg mb-6">
                            <div class="p-4 flex items-center">
                                <span class="flex bg-blue-600 items-center justify-center h-10 w-10 rounded-full">
                                    <i class="fas fa-truck text-white text-lg"></i>
                                </span>
                                <div class="ml-4">
                                    <p class="text-lg font-semibold text-blue-500">Se hacen envios a todo el país</p>
                                    <div class="mb-2">Ingresa tu código postal para calcular el costo y tiempo
                                        de
                                        entrega</div>
                                    @livewire('post-code')
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Descripción del producto --}}
                    <div class="bg-white rounded-lg shadow-lg mb-6 p-4">
                        <p class="mb-4 text-lg ">Descripción del producto</p>
                        <hr>
                        <p>{{ $product->description }}</p>
                    </div>

                    {{-- Items y valores de items --}}
                    <div class="bg-white rounded-lg shadow-lg p-4">
                        <p class="text-lg mb-4">Características generales</p>
                        <hr>
                        <table>
                            <tbody>
                                @foreach ($valuesItems as $i => $valuesItem)
                                    @if ($i % 2 == 0)
                                        <tr>
                                            <td class="flex">
                                                <p class="font-semibold mr-1">
                                                    {{ $valuesItem->item->name }}:
                                                </p> {{ $valuesItem->name }}
                                            </td>
                                            <td class="px-6">

                                            </td>
                                        @else
                                            <td class="flex">
                                                <p class="font-semibold mr-1">
                                                    {{ $valuesItem->item->name }}:
                                                </p> {{ $valuesItem->name }}
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($product->statusproduct_id == 1)
                        {{-- Botones de cantidad y compra --}}
                        @livewire('add-cart-product', ['product' => $product])
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scriptGlider')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
