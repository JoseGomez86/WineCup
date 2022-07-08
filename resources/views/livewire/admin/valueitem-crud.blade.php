<div>
    @if (!empty($valuesItems))
        @foreach ($valuesItems as $j => $valuesItem)
            <div class="mb-2" x-data="{ {{ $editValueItems[$j][0] }}: @entangle('editValueItems.'.$j.'.1') }">
                <div class="mt-1">
                    <div class="flex hidden" :class="{'hidden': {{ $editValueItems[$j][0] }} != 1}">

                        <x-jet-input type="text" class="w-full mr-1"
                            wire:model="EditValueItemname.{{ $j }}"
                            placeholder="Ingrese un item para modificar" />
                        {{-- save --}}
                        <x-button class="justify-center mr-1" color="green"
                            wire:click="saveUpdatevalueItem({{ $valuesItem->id }},{{ $j }})">
                            <i class="fas fa-check text-base"></i>
                        </x-button>

                        {{-- Cancel --}}
                        <x-button class="justify-center mr-1" color="red" wire:click="cancel('{{ $j }}')">
                            {{-- $set('editItems.{{ $j }}.1',0) --}}
                            <i class="fas fa-window-close text-base"></i>
                        </x-button>

                    </div>
                    <x-jet-input-error for="EditValueItemname.{{ $j }}" />

                    <div class="flex" :class="{ 'hidden': {{ $editValueItems[$j][0] }} != 0 }">
                        {{-- Edit --}}
                        <x-button class="w-8 h-8 justify-center mr-1" color="blue"
                            wire:click="$set('editValueItems.{{ $j }}.1',1)">
                            <i class="fas fa-edit"></i>
                        </x-button>

                        {{-- Delete --}}
                        <x-button class="w-8 h-8 justify-center" color="red"
                            wire:click="$emit('deleteValueItem','{{ $valuesItem->id }}')">
                            {{-- wire:click="destroyValueItem({{ $valuesItem->id }})"> --}}
                            <i class="fas fa-trash-alt"></i>
                        </x-button>
                        <p class="ml-2">{{ $valuesItem->name }}</p>
                    </div>

                </div>
            </div>
        @endforeach
    @endif

    <div class="flex mt-2">
        <x-button class="mr-2" color="blue"
            wire:click="createValueItem({{ $item->id, $i}})">
            <i class="fas fa-plus"></i>
        </x-button>
        <x-jet-input type="text" class="w-full" wire:model="valueItemNew.{{ $i }}"
            placeholder="Ingrese un nuevo valor de item" />
    </div>    
    <x-jet-input-error class="ml-14" for="valueItemNew.{{ $i }}" />

</div>
