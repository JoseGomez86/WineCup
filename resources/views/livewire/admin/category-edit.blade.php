<div>
    {{-- Nombre --}}
    <div class="mb-4">
        <x-jet-label value="Nombre" />
        <x-jet-input type="text" class="w-full" wire:model="category.name"
            placeholder="Ingrese el nombre de la categoría" />
        <x-jet-input-error for="category.name" />
    </div>

    {{-- Slug --}}
    <div class="mb-4">
        <x-jet-label value="Slug" />
        <x-jet-input type="text" class="w-full bg-gray-200" wire:model="category.slug" disabled
            placeholder="Nombre con el que se va a ver en la barra de direcciones" />
        <x-jet-input-error for="category.slug" />
    </div>

    {{-- Estado --}}
    <div class="bg-white shadow-lg rounded-lg p-6 mb-4">
        <p class="text-lg text-center font-semibold mb-4">Estado de la Categoría</p>
        <div class="flex justify-center">
            <label class="mr-8">
                <input type="radio" value="2" wire:model="category.status">
                Habilitado
            </label>
            <label class="mr-8">
                <input type="radio" value="1" wire:model="category.status">
                Deshabilitado
            </label>
        </div>
        <p class="text-center font-semibold mt-2 text-red-700">
            Al cambiar el estado de la categoría también se cambiaran los estados de todas las subcategorías y productos relacionados a la categoría.
        </p>
        <div class="flex justify-center">
            <x-jet-input-error for="category.status" />
        </div>
    </div>

    {{-- icon --}}
    <div class="grid grid-cols-4 gap-6 mb-4">
        <div class="col-span-3">
            <x-jet-label value="Icono" />
            <x-jet-input type="text" class="w-full" wire:model="category.icon"
                placeholder="Ingrese un icono de FontAwasome" />
            <x-jet-input-error for="category.icon" />
        </div>

        <div class="h-4">
            <div>Muesta del icono</div>
            <div class="text-3xl text-gray-700">{!! $category->icon !!}</div>
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
            <img class="h-64 w-full object-cover object-center" src="{{ Storage::url($category->image) }}" alt="">
        @endif
        <x-jet-input-error for="category.image" />
    </div>
    {{-- Botones --}}
    <div class="flex mb-4">
        <div class="ml-auto">
            <x-button class="mr-4" color="red" wire:click="cancel">Cancelar</x-button>
            <x-button class="ml-4 disabled" color="blue" wire:loading.attr="disabled"
                wire:target="editImage,updateCategory" wire:click="updateCategory">
                Actualizar
            </x-button>
        </div>
    </div>
</div>
