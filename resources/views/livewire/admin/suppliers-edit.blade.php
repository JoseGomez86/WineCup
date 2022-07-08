<div>
    {{-- Nombre de fantasía--}}
    <div class="mb-4">
        <x-jet-label value="Nombre de fantasía" />
        <x-jet-input type="text" class="w-full" wire:model="supplier.fictitious_name"
            placeholder="Ingrese el nombre de fantasía del proveedor" />
        <x-jet-input-error for="supplier.fictitious_name" />
    </div>

    {{-- Nombre de fantasía--}}
    <div class="mb-4">
        <x-jet-label value="Razón social" />
        <x-jet-input type="text" class="w-full" wire:model="supplier.trade_name"
            placeholder="Ingrese el nombre de fantasía del proveedor" />
        <x-jet-input-error for="supplier.trade_name" />
    </div>

    {{-- Cuit --}}
    <div class="mb-4">
        <x-jet-label value="Razón social" />
        <x-jet-input type="text" class="w-full" wire:model="supplier.cuit"
            placeholder="Ingrese el nombre de fantasía del proveedor" />
        <x-jet-input-error for="supplier.cuit" />
    </div>

    {{-- Cuit --}}
    <div class="mb-4">
        <x-jet-label value="Teléfono" />
        <x-jet-input type="text" class="w-full" wire:model="supplier.phone"
            placeholder="Ingrese el nombre de fantasía del proveedor" />
        <x-jet-input-error for="supplier.phone" />
    </div>

    {{-- Cuit --}}
    <div class="mb-4">
        <x-jet-label value="Dirección" />
        <x-jet-input type="text" class="w-full" wire:model="supplier.address"
            placeholder="Ingrese el nombre de fantasía del proveedor" />
        <x-jet-input-error for="supplier.address" />
    </div>
    
    {{-- Botones --}}
    <div class="flex mb-4">
        <div class="ml-auto">
            <x-button class="mr-4" color="red" wire:click="cancel">Cancelar</x-button>
            <x-button class="ml-4 disabled" color="blue" wire:loading.attr="disabled"
                wire:target="updateSupplier" wire:click="updateSupplier">
                Actualizar
            </x-button>
        </div>
    </div>
</div>
