<x-app-layout>
    @php
        // SDK de Mercado Pago
        require base_path('vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        // Crea un objeto de envio
        $shipments = new MercadoPago\Shipments();
        $shipments->cost=floatval($order->shippingCost);
        $shipments->mode="not_specified";

        $preference->shipments=$shipments;
        // Crea un ítems en la preferencia
        
        foreach ($products as $product) {
            $item = new MercadoPago\Item();
            $item->title = $product->name;
            $item->quantity = $product->qty;
            $item->unit_price = $product->price;
            $items[] = $item;
        }
        $preference->items = $items;

        $preference->back_urls = [
            'success' =>  route('orders.pay',$order),
            'failure' => route('orders.payment',$order),
            'pending' => route('orders.pay',$order),
        ];
        $preference->auto_return = 'approved';

        $preference->save();
    @endphp

    
    <div class="container-j py-8">
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-4 text-center">
            <p class="text-gray-700 uppercase font-semibold">número de orden de compra: {{ $order->id }}</p>
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
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6  flex justify-between items-center">
            <img class="h-8" src="{{ asset('img\mercado-pago.png') }}" alt="">
            <div class=" text-gray-700 uppercase">
                <p class="uppercase text-right">Subtotal: ${{ $order->total - $order->shippingCost }}</p>
                <p class="uppercase text-right">Envío: ${{ number_format($order->shippingCost, 2) }}</p>
                <p class="font-semibold text-right">Total: ${{ $order->total }}</p>
                {{-- Boton pagar MP --}}
                <div class="cho-container"></div>
            </div>
        </div>
    </div>


    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        // Agrega credenciales de SDK APP_USR-5fd3fe8a-842c-4d92-b8de-642541d49d68
        const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
            locale: 'es-AR'
        });

        // Inicializa el checkout
        mp.checkout({
            preference: {
                id: '{{ $preference->id }}'
            },
            render: {
                container: '.cho-container', // Indica el nombre de la clase donde se mostrará el botón de pago
                label: 'Pagar', // Cambia el texto del botón de pago (opcional)
            }
        });
    </script>
</x-app-layout>
