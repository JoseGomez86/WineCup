<div x-data="{ typeDwelling : @entangle('typeDwelling') }">
    <x-button color="blue" wire:click="$set('open',true)" class="mb-3 sm:ml-3 w-full sm:w-60">
        Ingresar una dirección
    </x-button>

    <x-jet-dialog-modal wire:model.defer="open">
        <x-slot name="title">
            Ingresa los datos de tu dirección para enviarte tu pedido
        </x-slot>

        <x-slot name="content">
            

            <div class="px-6 pb-6 grid grid-cols-2 gap-6">

                {{-- NameAddress --}}
                <div>
                    <x-jet-label value="Nombre dirección: " />
                    <x-jet-input type="text" class="w-full" wire:model.defer="nameAddress"
                        placeholder="Mi casa, trabajo, casa de mi amigo..." />
                    @error('nameAddress')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Provinces --}}
                <div>
                    <x-jet-label value="Provincia" />
                    <select class="form-control" wire:model="province_id">
                        <option value="" disabled selected>Seleccione una provincia</option>
                        @foreach ($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                    @error('province_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Districts --}}
                <div>
                    <x-jet-label value="Municipalidad" />
                    <select class="form-control" wire:model="district_id">
                        <option value="" disabled selected>Seleccione un municipio</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                    @error('district_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                {{-- Localities --}}
                <div>
                    <x-jet-label value="Localidad" />
                    <select class="form-control" wire:model="locality_id">
                        <option value="" disabled selected>Seleccione una localidad</option>
                        @foreach ($localities as $locality)
                            <option value="{{ $locality->id }}">{{ $locality->name }}</option>
                        @endforeach
                    </select>
                    @error('locality_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                {{-- street --}}
                <div>
                    <x-jet-label value="Calle" />
                    <x-jet-input wire:model.defer="street" type="text" class="form-control" />
                    @error('street')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- numberHome --}}
                <div>
                    <x-jet-label value="Altura" />
                    <x-jet-input wire:model.defer="numberHome" type="text" class="form-control"
                    placeholder="S/N en caso de no tener altura." />
                    @error('numberHome')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Postcode --}}
                <div>
                    <x-jet-label value="Código Postal" />
                    <select class="form-control" wire:model="postcode_id">
                        <option value="" disabled selected>Seleccione un Código Postal</option>
                        @foreach ($postcodes as $postcode)
                            <option value="{{ $postcode->id }}">{{ $postcode->Postcode }}</option>
                        @endforeach
                    </select>
                    @error('postcode_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Aparmet --}}
                <div class=" col-span-2">
                    <input x-model="typeDwelling" type="checkbox" 
                    wire:model="typeDwelling" name="typeDwelling" value=1>
                    <label>Departamento</label>
                </div>
                
                <div class="hidden" :class="{ 'hidden': typeDwelling != 1 }">
                    <x-jet-label value="Complejo" />
                    <x-jet-input wire:model.defer="apartmentComplex" type="text" class="form-control" />
                </div>
                <div class="hidden" :class="{ 'hidden': typeDwelling != 1 }">
                    <x-jet-label value="Edificio" />
                    <x-jet-input wire:model.defer="edifice" type="text" class="form-control" />
                </div>
                <div class="hidden" :class="{ 'hidden': typeDwelling != 1 }">
                    <x-jet-label value="Piso" />
                    <x-jet-input wire:model.defer="floor" type="text" class="form-control" />
                    @error('floor')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="hidden" :class="{ 'hidden': typeDwelling != 1 }">
                    <x-jet-label value="Departamento" />
                    <x-jet-input wire:model.defer="apartment" type="text" class="form-control" />
                    @error('apartment')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- references --}}
                <div class="col-span-2">
                    <x-jet-label value="Referencias" />
                    <x-textarea wire:model.defer="reference" type="text"
                        placeholder="Entre calles y cualquier caracteristica que identifique tu vivienda. Para direcciones catastrales o barrios cerrados ingresa acá los datos para que ubiquemos tu dirección."
                        class="form-control" />
                </div>

            </div>
        
        </x-slot>

        <x-slot name="footer">
            <x-button class="mr-4" color="red" wire:click="closed">Cancelar</x-button>
            <x-button class="ml-4" color="blue" wire:click="saveAddress">Guardar</x-button>
        </x-slot>

    </x-jet-dialog-modal>

</div>
