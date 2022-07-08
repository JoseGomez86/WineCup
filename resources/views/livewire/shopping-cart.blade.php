<div>
    <div class="container-j py-8">
        <section class="bg-white rounded-lg shadow-lg p-6 text-gray-700">
            <h1 class="text-lg font-semibold mb-6">CARRITO DE COMPRAS</h1>

            @if (Cart::count())
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $product)
                            <tr>
                                <th>
                                    <div class="flex">
                                        <img class="h-15 w-20 object-cover mr-4 hidden sm:block" src="{{ $product->options->image }}"
                                            alt="">
                                        <div>
                                            <p class="font-bold leading-15 text-sm sm:text-base">{{ $product->name }}</p>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <span class="text-xs sm:text-base">$ {{ $product->price }}</span>
                                </th>
                                <th class="flex justify-center">
                                    @livewire('update-cart-product', ['rowId' => $product->rowId], key($product->rowId))
                                    {{-- <span>{{$product->qty}}</span> --}}
                                </th>
                                <th>
                                    <span class="text-xs sm:text-base">$ {{ $product->price * $product->qty }}</span>
                                </th>
                                <th class="items-center">
                                    <a class="ml-6 cursor-pointer text-xs sm:text-base hover:text-red-600"
                                        wire:click="delete('{{$product->rowId}}')"
                                        wire:loading.class="text-red-600 opacity-25"
                                        wire:tarjet="delete('{{$product->rowId}}')">
                                        <i class="fas fa-trash text-xl"></i>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a class="text-sm cursor-pointer hover:underline mt-3 inline-block" wire:click="destroy">
                    <i class="fas fa-trash"></i>
                    Borrar carrito de compras
                </a>
            @else
                <div class="flex flex-col items-center">
                    <i class="fas fa-cart-arrow-down text-blue-500 text-3xl"></i>

                    <p class="text-lg text-gray-700 py-4">TU CARRITO DE COMPRAS ESTA VACÍO</p>
                    <a href="/">
                        <x-button color="red" class="px-16">
                            Ir al inicio
                        </x-button>
                    </a>
                </div>
            @endif
        </section>

        @if (Cart::count())
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-700">
                            <span class="font-bold text-lg">Total: </span>
                            $ {{ Cart::subTotal() }}
                        </p>
                    </div>

                    <a href="{{route('orders.create')}}">
                        <x-button color="red" class="px-16">
                            Continuar
                        </x-button>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
