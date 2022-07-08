<div>
    {{-- Nombre de fantasía--}}
    <div class="mb-4">
        <x-jet-label value="Nombre de fantasía" />
        <x-jet-input type="text" class="w-full" wire:model="fictitious_name"
            placeholder="Ingrese el nombre de fantasía del proveedor" />
        <x-jet-input-error for="fictitious_name" />
    </div>

    {{-- Nombre de fantasía--}}
    <div class="mb-4">
        <x-jet-label value="Razón social" />
        <x-jet-input type="text" class="w-full" wire:model="trade_name"
            placeholder="Ingrese el nombre de fantasía del proveedor" />
        <x-jet-input-error for="trade_name" />
    </div>

    {{-- Cuit --}}
    <div class="mb-4">
        <x-jet-label value="Cuit" />
        <x-jet-input type="text" class="w-full" wire:model="cuit"
            placeholder="Ingrese el nombre de fantasía del proveedor" />
        <x-jet-input-error for="cuit" />
    </div>

    {{-- Cuit --}}
    <div class="mb-4">
        <x-jet-label value="Teléfono" />
        <x-jet-input type="text" class="w-full" wire:model="phone"
            placeholder="Ingrese el nombre de fantasía del proveedor" />
        <x-jet-input-error for="phone" />
    </div>

    {{-- Cuit --}}
    <div class="mb-4">
        <x-jet-label value="Dirección" />
        <x-jet-input type="text" class="w-full" wire:model="address"
            placeholder="Ingrese el nombre de fantasía del proveedor" />
        <x-jet-input-error for="address" />
    </div>
    
    {{-- Botones --}}
    <div class="flex mb-4">
        <div class="ml-auto">
            <x-button class="mr-4" color="red" wire:click="cancel">Cancelar</x-button>
            <x-button class="ml-4 disabled" color="blue" wire:loading.attr="disabled"
                wire:target="createSupplier" wire:click="createSupplier">
                Guardar
            </x-button>
        </div>
    </div>
</div>
