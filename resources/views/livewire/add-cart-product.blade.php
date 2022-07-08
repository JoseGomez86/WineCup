<div x-data>

    <div class="grid justify-items-center  bg-gray-50 rounded-lg mt-4">
        <p class="text-gray-800 py-4 ml-4">
            <span class="font-semibold text-lg"> Stock disponible: {{ $quantity }}</span>
        </p>
        <div>
            <x-button class="text-xl font-semibold" width="w-12" disabled x-bind:disabled="$wire.qty <= 1"
                wire:click="decrement">
                -
            </x-button>
            <span class="mx-2 text-gray-700 font-semibold">{{ $qty }}</span>
            <x-button class="text-xl font-semibold" width="w-12" x-bind:disabled="$wire.qty >= $wire.quantity"
                wire:click="increment">
                +
            </x-button>
        </div>
        <div class="mb-4"></div>
    </div>
    <x-button color='red' class="mt-4" width="w-full" x-bind:disabled="$wire.qty > $wire.quantity"
        wire:click="addProduct" wire:loading.attr="disable" wire:target="addProduct">
        Agregar
        <i class="text-3xl fas fa-cart-plus"></i>
    </x-button>

</div>
