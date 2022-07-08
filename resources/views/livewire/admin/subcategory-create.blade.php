<div>
    {{-- Categoría --}}
    <div class="mb-4">
        <x-jet-label value="Categoría" />
        <select class="w-full form-control" wire:model="category_id">
            <option value="" selected disabled>Seleccione una categoría</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <x-jet-input-error for="category_id" />
    </div>

    {{-- Nombre --}}
    <div class="mb-4">
        <x-jet-label value="Nombre" />
        <x-jet-input type="text" class="w-full" wire:model="name"
            placeholder="Ingrese el nombre de la subcategoría" />
        <x-jet-input-error for="name" />
    </div>

    {{-- Slug --}}
    <div class="mb-4">
        <x-jet-label value="Slug" />
        <x-jet-input type="text" class="w-full bg-gray-200" wire:model="slug" disabled
            placeholder="Nombre con el que se va a ver en la barra de direcciones" />
        <x-jet-input-error for="slug" />
    </div>

    {{-- Estado --}}
    <div class="bg-white shadow-lg rounded-lg p-6 mb-4">
        <p class="text-lg text-center font-semibold mb-4">Estado de la Subcategoría</p>
        <div class="flex justify-center">
            <label class="mr-8">
                <input type="radio" value="2" wire:model="status">
                Habilitado
            </label>
            <label class="mr-8">
                <input type="radio" value="1" wire:model="status">
                Deshabilitado
            </label>
        </div>
        <div class="flex justify-center">
            <x-jet-input-error for="status" />
        </div>
    </div>

    {{-- image --}}
    <div class="mb-4">
        <x-jet-label value="Imágen" />
        <input type="file" wire:model="image" accept="image/*" name="" id="{{ $rand }}" class="m-2">
        @if ($image)
            <img class="h-64 w-full object-cover object-center" src="{{ $image->temporaryUrl() }}" alt="">
        @endif
        <x-jet-input-error for="image" />
    </div>

    {{-- Items --}}
    <div>
        <hr>
        {{-- {{ print_r($ItemsNew) }} --}}
        <div class="font-semibold mb-4">
            <p class="text-xl mr-2">Items</p>
        </div>
        <div class="sm:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mb-4 gap-6">

            @foreach ($ItemsNew as $i => $item)
                <div class="mb-2">
                    <div class="flex">

                        <x-jet-input type="text" class="w-full" wire:model="ItemsNew.{{ $i }}.0"
                            placeholder="Ingrese un nuevo Item" />

                        @if ($ItemsNew[$i][0] != '')
                            {{-- Delete --}}
                            <x-button class="ml-1" color="red" wire:click="deleteItem({{ $i }})">
                                <i class="fas fa-trash-alt"></i>
                            </x-button>
                        @endif
                        @isset($ItemsNew[$i + 1][0])
                        @else
                            <x-button class="ml-1" color="blue" wire:click="addItem({{ $i }})">
                                <i class="fas fa-plus"></i>
                            </x-button>
                        @endisset
                        
                    </div>
                    <x-jet-input-error for="ItemsNew.{{ $i }}.0" />

                    <hr class="mt-2">

                    
                    @if ($ItemsNew[$i][0] != '')
                        @foreach ($item as $j => $valueItem)
                            <div class="mt-2">
                                <div class="flex">
                                    <x-jet-input type="text" class="w-full"
                                        wire:model="ItemsNew.{{ $i }}.{{ $j + 1 }}"
                                        placeholder="Ingrese un nuevo Valor de Item" />
                                    @isset($ItemsNew[$i][$j + 1])
                                        {{-- Delete --}}
                                        <x-button class="ml-1" color="red"
                                            wire:click="deleteValueitem({{ $i }},{{ $j + 1 }})">
                                            <i class="fas fa-trash-alt"></i>
                                        </x-button>
                                    @endisset

                                </div>
                                <x-jet-input-error class="ml-14" for="ItemsNew.{{ $i }}" />
                            </div>
                        @endforeach
                    @endif

                </div>
            @endforeach

        </div>

        <div class="sm:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        </div>
    </div>



    {{-- Botones --}}
    <div class="flex mb-4">
        <div class="ml-auto">
            <x-button class="mr-4" color="red" wire:click="cancel">Cancelar</x-button>
            <x-button class="ml-4 disabled" color="blue" wire:loading.attr="disabled"
                wire:target="image,saveSubcategory" wire:click="saveSubcategory">
                Guardar
            </x-button>
        </div>
    </div>
</div>
