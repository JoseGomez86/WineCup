<div>
    <hr>
    <div class="font-semibold mb-4">
        <p class="text-xl mr-2">Items</p>
    </div>
    <div class="sm:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mb-4 gap-6">
        @foreach ($ItemsNew as $i => $item)
            <div class="mb-2" x-data="{ {{ $editItems[$i][0] }}: @entangle('editItems.'.$i.'.1') }">
                {{-- {{$i}} {{$item}} --}}
                <div class="flex" :class="{'hidden': {{ $editItems[$i][0] }} != 1}">
                    <x-button class="mr-2" color="blue" wire:click="addItem({{ $i }})">
                        <i class="fas fa-plus"></i>
                    </x-button>
                    <x-jet-input type="text" class="w-full" wire:model="ItemsNew.{{ $i }}"
                        placeholder="Ingrese un nuevo Item" />
                    <div class="">
                    </div>
                </div>
                <div class="flex hidden" :class="{ 'hidden': {{ $editItems[$i][0] }} != 0 }">

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
                <x-jet-input-error class="ml-14" for="ItemsNew.{{ $i }}" />

            </div>
        @endforeach
    </div>

    <div class="sm:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

    </div>
</div>
