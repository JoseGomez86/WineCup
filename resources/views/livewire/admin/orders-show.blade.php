<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-lg shadow-lg px-12 py-12 mb-4 flex items-center">
        <div class="h-1 flex-1 mx-2"></div>
        {{-- Muestro el / los estados que ya tuvo la orden --}}
        @foreach ($statusesNow as $statusNow)
            @if (!$loop->first)
                <div class="h-1 flex-1 mx-2 {{ $loop->last ? 'bg-blue-400' : 'bg-green-400' }}">
                </div>
            @endif
            <div class="relative">
                <div
                    class="rounded-full w-16 h-16 flex items-center justify-center 
                        {{ $loop->last ? 'bg-blue-400' : 'bg-green-400' }}">
                    <div class="text-4xl text-white  text-center">{!! $statusNow->icon !!}</div>
                </div>
                <div class="absolute text-center">
                    <p class="text-sm">{{ $statusNow->name }}</p>
                </div>
            </div>
            @if ($loop->last && $order->status_id < 6)
                <div class="h-1 flex-1 mx-2 bg-gray-400">
                </div>
            @endif
        @endforeach
        {{-- Muestro el / los estados que le faltan a la orden --}}
        @foreach ($statuses as $status)
            @if ($status->id > $statusNow->id && $status->id < 6)
                <div>
                    <div class="rounded-full w-16 h-16 relative flex items-center justify-center bg-gray-400">
                        <div class="text-4xl text-white  text-center">{!! $status->icon !!}</div>
                    </div>

                    <div class="absolute text-center">
                        <p class="text-sm">{{ $status->name }}</p>
                    </div>
                </div>
                @if (!$loop->last && $status->id != 5)
                    <div class="h-1 flex-1 mx-2 bg-gray-400">
                    </div>
                @endif
            @endif
        @endforeach

        <div class="h-1 flex-1 mx-2"></div>
    </div>

    <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-4 text-center">
        <p class="text-gray-700 uppercase font-semibold">número de orden de compra: {{ $order->id }}</p>
        <div class="justify-center mb-2 mt-2">
            @if ($order->status_id == 1)
                <div class="text-red-500 mb-2 font-semibold">
                    Todavía no se pago la orden de compra.
                </div>
            @endif
            @if (($order->status_id != 1 && $order->status_id < 5) || $order->status_id == 7)
                <x-button color="blue" class="mb-2" wire:click="updateStatusOrder"
                    wire:loading.attr="disable">
                    @if ($order->status_id == 2)
                        Procesar orden de compra.
                    @elseif($order->status_id == 3)
                        Enviar orden de compra.
                    @elseif($order->status_id == 4)
                        Orden de compra entregada.
                    @endif
                </x-button>
            @endif

            @if ($order->status_id == 7 || $order->status_id < 5)
                @livewire('cancel-order',['order' => $order] )
            @endif
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <div class="grid grid-cols-2 gap-6 text-gray-700">
            <div>
                <p class="text-lg uppercase font-semibold">envío</p>
                @if ($order->envio_type == 1)
                    <p class="text-sm">Retiro en tienda</p>
                    <p class="text-sm">Calle de retiro 1234</p>
                @else
                    <p class="font-semibold">Envío a domicilio a: {{ $address->name }}</p>
                    <p class="text-sm">Calle: {{ $address->street }} {{ $address->number }}</p>
                    <p class="text-sm">Código postal: {{ $address->postcode }}</p>
                    @if (isset($address->apartment) && !empty($address->apartment))
                        <p class="text-sm">Complejo: {{ $address->apartmentComplex }}</p>
                        <p class="text-sm">Edif.: {{ $address->edifice }}</p>
                        <p class="text-sm">Piso: {{ $address->floor }}</p>
                        <p class="text-sm">Depto.: {{ $address->apartment }}</p>
                    @endif
                    <p class="text-sm">{{ $address->province }},
                        {{ $address->district }},
                        {{ $address->locality }}</p>
                    <p class="text-sm">Referencias: {{ $address->reference }}
                @endif
            </div>

            <div>
                <p class="text-lg uppercase font-semibold">Datos del comprador</p>
                <p class="text-sm">Nombre: {{ $buyerData->name }}</p>
                <p class="text-sm">DNI: {{ $buyerData->dni }}</p>
                <p class="text-sm">Télefono: {{ $buyerData->Phone1 }}</p>
                <p class="text-sm">Télefono opcional: {{ $buyerData->Phone2 }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 mb-4">
        <p class="text-lg uppercase font-semibold">resumen de compra</p>

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th>
                            <div class="flex">
                                <img class="h-15 w-20 object-cover mr-4 hidden sm:block"
                                    src="{{ $product->options->image }}" alt="">
                                <div>
                                    <p class="font-bold leading-15 text-sm sm:text-base">{{ $product->name }}
                                    </p>
                                </div>
                            </div>
                        </th>
                        <th>
                            <span class="text-xs sm:text-base">$ {{ $product->price }}</span>
                        </th>
                        <th>
                            <span class="text-xs sm:text-base">{{ $product->qty }}</span>
                        </th>
                        <th>
                            <span class="text-xs sm:text-base">$ {{ $product->price * $product->qty }}</span>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex">
            <div class="ml-auto mr-10 mt-2 font-bold">
                <p class="text-sm mb-2">
                    Envío: $ {{ $order->shippingCost }}
                </p>
                <hr>
                Total: $ {{ $order->total }}
            </div>
        </div>        
    </div>
</div>
