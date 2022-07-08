<div class="flex-1 relative" x-data>
    <x-jet-input name="name" wire:model="search" class="w-full" type="text"
        placeholder="Ingrese el producto que busca" />
    <div class="absolute w-full hidden" :class="{ 'hidden': !$wire.open }" @click.away="$wire.open=false">
        <div class="bg-white rounded-lg shadow mt-1">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $j => $product)
                    <a class="flex cursor-pointer hover:bg-gray-300" wire:click="selectProduct({{ $j }})">
                        <div class="text-gray-700 mb-2">
                            <p class="font-semibold leading-5">{{ $product->name }}</p>
                        </div>
                    </a>
                @empty
                    <div class="flex">
                        <i class="far fa-frown-open"></i>
                        <p class="ml-2 leading-5">
                            No tenemos ningún producto que coincida con tu busqueda.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
