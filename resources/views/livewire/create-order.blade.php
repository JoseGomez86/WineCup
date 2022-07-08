<div class="container-j py-8 sm:grid sm: grid-cols-6 md:grid-cols-5 gap-6"
    x-data="{ address_id : @entangle('address_id') }">
    <div class="col-span-3">
        <p class="mt-6 mb-3 text-xl text-gray-700 font-semibold">Tus datos</p>
        <div class="bg-white rounded-lg shadow p-4 flex flex-col">
            <div class="p-2">
                <x-jet-label value="Nombre: " />
                <x-jet-input type="text" class="w-full" wire:model.defer="name" />
                @error('name')
                    <span class="p-2 text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="p-2">
                <x-jet-label value="DNI: " />
                <x-jet-input type="text" class="w-full" wire:model.defer="dni" />
                @error('dni')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="p-2">
                <x-jet-label value="Teléfono: " />
                <x-jet-input type="text" class="w-full" wire:model.defer="Phone1" />
                @error('Phone1')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="p-2">
                <x-jet-label value="Teléfono opcional: " />
                <x-jet-input type="text" class="w-full" wire:model.defer="Phone2" />
                @error('Phone2')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="p-2">
                <p>Estos datos son lo que vamos a corroborar al momento de entregar el producto.</p>
                <p>Por favor verificar que sean correctos.</p>
            </div>

            <div class="flex">
                <x-jet-action-message class="mr-3 py-4" on="saved">
                    Guardado.
                </x-jet-action-message>
                <x-button class="mt-4 w-full sm:w-60 " 
                    wire:loading.attr="disabled"
                    wire:target="update_data"
                    color="blue" wire:click="update_data">
                    Guardar
                </x-button>
            </div>


        </div>

        <p class="mt-6 mb-3 text-xl text-gray-700 font-semibold">Envío</p>
        {{-- Direeciones para envio de compra --}}
        @if (isset($addresses) && !empty($addresses))
            @livewire('create-address')
            @foreach ($addresses as $address)
                <label class="bg-white rounded-lg shadow px-6 py-4 flex mb-4">
                    <input type="radio" name="envio" class="text-gray-600" value='{{ $address->id }}'
                        x-model='address_id'>
                    <div class="grid grid-cols-6">
                        <div class="col-span-6 flex">
                            <p class="ml-6 text-gray-700 font-semibold uppercase">{{ $address->name }}</p>
                            @livewire('edit-address', ['address' => $address], key($address->id))
                        </div>
                        <p class="col-span-6">Calle: {{ $address->street }} {{ $address->number }}</p>
                        <p class="col-span-6">Código postal: {{ $address->postcode->Postcode }}</p>
                        @if (isset($address->apartment) && !empty($address->apartment))
                            <p class="col-span-3">Complejo: {{ $address->apartmentComplex }}</p>
                            <p class="">Edif.: {{ $address->edifice }}</p>
                            <p class="">Piso: {{ $address->floor }}</p>
                            <p class="">Depto.: {{ $address->apartment }}</p>
                        @endif
                        <p class="col-span-6">{{ $address->province->name }}, {{ $address->district->name }},
                            {{ $address->locality->name }}</p>
                        <p class="col-span-6">Referencias: {{ $address->reference }}

                    </div>
                </label>
            @endforeach
        @else
            @livewire('create-address')
        @endif
    </div>

    <div class="sm:col-span-2 col-span-3">
        <p class="mt-6 mb-3 text-xl text-gray-700 font-semibold">Detalle de tu compra</p>
        <div class="bg-white rounded-lg shadow p-4">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2">
                        <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                        <article class="flex-1">
                            <h1>{{ $item->name }}</h1>
                            <p>Cantidad: {{ $item->qty }}</p>
                            <p>$ {{ $item->price }}</p>
                        </article>
                    </li>
                @empty
                    <li class="p-3">
                        <p class=" text-center text-gray-700">
                            El carrito esta vacío
                        </p>
                    </li>
                @endforelse
            </ul>
            <hr class="mt-4 mb-3">
            <div>
                <p class="flex justify-between items">
                    Subtotal
                    <span class="font-semibold">${{ Cart::subtotal() }}</span>
                </p>
                @if (empty($shippingCost))
                    <hr>
                    <span>Tenes que seleccionar una dirección para calcular el costo de envío</span>
                @else
                    <p class="flex justify-between items">
                        Costo de envio
                        <span class="font-semibold">${{ $shippingCost }}</span>
                    </p>
                @endif

            </div>
            <hr class="mt-4 mb-3">
            <p class="flex justify-between items font-semibold">
                <span class="text-lg">Total</span>
                ${{ Cart::subtotalFloat() + $shippingCost }}
            </p>
        </div>
        <x-button class="mt-4 w-full" 
            color="red" wire:loading.attr="disabled"
            wire:target="create_order"
            wire:click="create_order">
            Continuar la compra
        </x-button>
        <x-jet-validation-errors></x-jet-validation-errors>
    </div>


</div>
