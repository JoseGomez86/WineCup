<div>
    {{-- Nombre --}}
    <div class="mb-4">
        <x-jet-label value="Nombre" />
        <x-jet-input type="text" class="w-full" wire:model="name"
            placeholder="Ingrese el nombre de la categoría" />
        <x-jet-input-error for="name" />
    </div>

    {{-- Slug --}}
    <div class="mb-4">
        <x-jet-label value="Slug" />
        <x-jet-input type="text" class="w-full bg-gray-200" wire:model="slug" disabled
            placeholder="Nombre con el que se va a ver en la URL" />
        <x-jet-input-error for="slug" />
    </div>

    {{-- Estado --}}
    <div class="bg-white shadow-lg rounded-lg p-6 mb-4">
        <p class="text-lg text-center font-semibold mb-4">Estado de la Categoría</p>
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

    {{-- icon --}}
    <div class="grid grid-cols-4 gap-6 mb-4">
        <div class="col-span-3">
            <x-jet-label value="Icono" />
            <x-jet-input type="text" class="w-full" wire:model="icon"
                placeholder="Ingrese un icono de FontAwasome" />
            <x-jet-input-error for="icon" />
        </div>

        <div class="h-4">
            <div>Muesta del icono</div>
            <div class="text-3xl text-gray-700">{!! $icon !!}</div>
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

    {{-- Botones --}}
    <div class="flex mb-4">
        <div class="ml-auto">
            <x-button class="mr-4" color="red" wire:click="cancel">Cancelar</x-button>
            <x-button class="ml-4 disabled" color="blue" wire:loading.attr="disabled"
                wire:target="editImage,saveCategory" wire:click="saveCategory">
                Guardar
            </x-button>
        </div>
    </div>
</div>
