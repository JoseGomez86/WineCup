<div>

    {{-- Categoría --}}
    <div class="mb-4">
        <x-jet-label value="Categoria" />
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
        <x-jet-input type="text" class="w-full" wire:model="subcategory.name"
            placeholder="Ingrese el nombre de la subcategoría" />
        <x-jet-input-error for="subcategory.name" />
    </div>

    {{-- Slug --}}
    <div class="mb-4">
        <x-jet-label value="Slug" />
        <x-jet-input type="text" class="w-full bg-gray-200" wire:model="subcategory.slug" disabled
            placeholder="Nombre con el que se va a ver en la barra de direcciones" />
        <x-jet-input-error for="subcategory.slug" />
    </div>

    {{-- Estado --}}
    <div class="bg-white shadow-lg rounded-lg p-6 mb-4">
        <p class="text-lg text-center font-semibold mb-4">Estado de la Subcategoría</p>
        <div class="flex justify-center">
            <label class="mr-8">
                <input type="radio" value="2" wire:model="subcategory.status">
                Habilitado
            </label>
            <label class="mr-8">
                <input type="radio" value="1" wire:model="subcategory.status">
                Deshabilitado
            </label>
        </div>
        <p class="text-center font-semibold mt-2 text-red-700">
            Al cambiar el estado de la subcategoría también se cambiaran los estados todos los productos relacionados a
            esta.
        </p>
        <div class="flex justify-center">
            <x-jet-input-error for="subcategory.status" />
        </div>
    </div>

    {{-- image --}}
    <div class="mb-4">
        <x-jet-label value="Imágen" />
        <input type="file" wire:model="editImage" accept="image/*" name="" id="{{ $rand }}"
            class="m-2">
        @if ($editImage)
            <img class="h-64 w-full object-cover object-center" src="{{ $editImage->temporaryUrl() }}" alt="">
        @else
            <img class="h-64 w-full object-cover object-center" src="{{ Storage::url($subcategory->image) }}" alt="">
        @endif
        <x-jet-input-error for="subcategory.image" />
    </div>

    @livewire('admin.item',['subcategory' => $subcategory], key($subcategory->id))
    {{-- Items --}}


    {{-- Botones --}}
    <div class="flex mb-4">
        <div class="ml-auto">
            <x-button class="mr-4" color="red" wire:click="cancel">Cancelar</x-button>
            <x-button class="ml-4 disabled" color="blue" wire:loading.attr="disabled"
                wire:target="editImage,updateSubcategory" wire:click="updateSubcategory">
                Actualizar
            </x-button>
        </div>
    </div>

</div>
