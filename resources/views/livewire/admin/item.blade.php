<div>
    <hr>
    <div class="font-semibold mb-4">
        <p class="text-xl mr-2">Items</p>
        <p class="text-sm">Las modificaciones realizadas en los items se veran reflejadas sin actualizar la
            subcategoría</p>
    </div>
    <div class="sm:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mb-4">
        <div>
            <div class="flex">
                <x-button class="mr-2" color="blue" wire:click="saveCreateItem()">
                    <i class="fas fa-plus"></i>
                </x-button>
                <x-jet-input type="text" class="w-full" wire:model="ItemNew"
                    placeholder="Ingrese un nuevo Item" />
                <div class="">
                </div>
            </div>
            <x-jet-input-error class="ml-14" for="ItemNew" />
        </div>
    </div>

    <div class="sm:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($items as $i => $item)
            <div class="mb-4">
                <div class="mb-2" x-data="{ {{ $editItems[$i][0] }}: @entangle('editItems.'.$i.'.1') }">

                    <div class="flex hidden" :class="{'hidden': {{ $editItems[$i][0] }} != 1}">

                        <x-jet-input type="text" class="w-full mr-1" wire:model="EditItemname.{{ $i }}"
                            placeholder="Ingrese un item para modificar su nombre" />

                        {{-- Save --}}
                        <x-button class="justify-center mr-1" color="green"
                            wire:click="saveUpdateItem({{ $item->id }},{{ $i }})">
                            <i class="fas fa-check text-base"></i>
                        </x-button>

                        {{-- Cancel --}}
                        <x-button class="justify-center mr-1" color="red" wire:click="cancel('{{ $i }}')">
                            {{-- $set('editItems.{{ $i }}.1',0) --}}
                            <i class="fas fa-window-close text-base"></i>
                        </x-button>

                    </div>
                    <x-jet-input-error for="EditItemname.{{ $i }}" />

                    <div class="flex" :class="{ 'hidden': {{ $editItems[$i][0] }} != 0 }">

                        {{-- Edit --}}
                        <x-button class="w-8 h-8 justify-center mr-1" color="blue"
                            wire:click="$set('editItems.{{ $i }}.1',1)">
                            <i class="fas fa-edit"></i>
                        </x-button>
                        {{-- Delete --}}
                        <x-button class="w-8 h-8 justify-center" color="red"
                            wire:click="$emit('deleteItem','{{ $item->id }}')">
                            <i class="fas fa-trash-alt"></i>
                        </x-button>
                        <p class="ml-2 text-lg">{{ $item->name }}</p>

                    </div>

                </div>
                <hr>
                @livewire('admin.valueitem-crud', ['item' => $item,'i'=>$i], key($item->id))
            </div>
        @endforeach
    </div>
</div>
