<div>
    <div class="grid grid-cols-1 md:grid-cols-4 mb-4">
        {{-- Fecha de ingreso --}}
        <div class="md:col-span-1 mr-2">
            <x-jet-label value="Fecha de ingreso" />
            <x-jet-input type="date" class="w-full" wire:model="dateAdmission" />
            <x-jet-input-error for="dateAdmission" />
        </div>

        {{-- Proveedor --}}
        <div class="md:col-span-2 mr-2">
            <x-jet-label value="Proveedor" />
            <select class="w-full form-control h-10" wire:model="supplier_id">
                <option value="" selected disabled>Seleccione una categoría</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->fictitious_name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="supplier_id" />
        </div>

        {{-- Factura o remito --}}
        <div class="md:col-span-1 mr-2">
            <x-jet-label value="Factura o Remito" />
            <x-jet-input type="text" class="w-full" wire:model="invoice" placeholder="001-0000002" />
            <x-jet-input-error for="invoice" />
        </div>
    </div>

    <div class="card">
        <div class=" bg-blue-200">
            <div class="m-4">
                <div class="grid grid-cols-7 md:grid-cols-6 mb-1">
                    <x-jet-label class="ml-1" value="Cantidad" />
                    <x-jet-label class="ml-2 col-span-3" value="Producto" />
                    <x-jet-label class="ml-2" value="Vencimiento" />
                </div>
                <div class="grid grid-cols-7 md:grid-cols-6 mb-2">
                    <div class="col-span-1 ml-1 md:ml-2">
                        <x-jet-input type="number" class="w-full" wire:model="quantity" placeholder="cantidad" />
                        <x-jet-input-error for="quantity" />
                    </div>
                    <div class="col-span-3 ml-1 md:ml-2">
                        @livewire('admin.search-product')
                        <x-jet-input-error for="product" />
                    </div>
                    <div class="col-span-2 md:col-span-1 ml-1 md:ml-2">
                        <x-jet-input type="date" class="w-full" wire:model="expiryDate" />
                        <x-jet-input-error for="expiryDate" />
                    </div>
                    @if ($editItem)
                        <x-button class="h-10 ml-3" color="green" wire:loading.attr="disabled" wire:target="addProduct"
                            wire:click="editProduct()">
                            Modificar
                        </x-button>
                    @else
                        <x-button class="h-10 ml-3" color="green" wire:loading.attr="disabled" wire:target="addProduct"
                            wire:click="addProduct()">
                            Agregar
                        </x-button>
                    @endif
                </div>
            </div>
        </div>
        <hr>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Cantidad</th>
                        <th>Producto</th>
                        <th>Vencimiento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productNew as $i => $productadd)
                        <tr>
                            <td>
                                {{ $productadd['quantity'] }}
                            </td>
                            <td>
                                {{ $productadd['product']['name'] }}
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($productadd['expiryDate'])) }}
                            </td>
                            <td>
                                {{-- Delete --}}
                                <x-button class="h-10 mr-4" width="w-12" color="red"
                                    wire:click="deleteProduct({{ $i }})">
                                    <i class="fas fa-trash-alt"></i>
                                </x-button>
                                {{-- Edit --}}
                                <x-button class="h-10" width="w-12" color="blue"
                                    wire:click="editItem({{ $i }})">
                                    <i class="fas fa-edit"></i>
                                </x-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- @php
        if ($productNew) {
            print_r($productNew[0]['product']['id']);
        }
    @endphp --}}
    {{-- Botones --}}
    @if ($productNew)
        <div class="hidden sm:flex mt-4">
            <div class="ml-auto">
                <x-button class="mr-4" color="red" wire:click="cancel">Cancelar</x-button>
                <x-button class="ml-4 mr-4 disabled" color="blue" wire:loading.attr="disabled"
                    wire:target="saveReceptiongood" wire:click="saveReceptiongood">
                    Guardar
                </x-button>
            </div>
        </div>
        <div class="sm:hidden grid grid-cols-2 mb-4">
            <x-button width="w-full" color="red" wire:click="cancel">Cancelar</x-button>
            <x-button class="ml-2 disabled" width="w-full" color="blue" wire:loading.attr="disabled"
                wire:target="saveReceptiongood" wire:click="saveReceptiongood">
                Guardar
            </x-button>
        </div>
    @endif

</div>
