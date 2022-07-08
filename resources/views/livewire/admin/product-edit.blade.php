<div>
    <div>
        {{-- Categoría / Subcategoría --}}
        <div class="grid grid-cols-2 gap-6 mb-4">
            {{-- Categoría --}}
            <div>
                <x-jet-label value="Categorias" />
                <select class="w-full form-control" wire:model="category_id">
                    <option value="" selected disabled>Seleccione una categoría</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="category_id" />
            </div>
            {{-- Subcategoría --}}
            <div>
                <x-jet-label value="Subcategorias" />
                <select class="w-full form-control" wire:model="product.subcategory_id">
                    <option value="" selected disabled>Seleccione una subcategoría</option>

                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="product.subcategory_id" />
            </div>
        </div>

        {{-- Estado --}}
        <div class="bg-white shadow-lg rounded-lg p-6 mb-4">
            <p class="text-lg text-center font-semibold mb-4">Estado del producto</p>
            <div class="flex justify-center">
                @if ($subcategory_select->status != 1)
                    @foreach ($statusProducts as $statusProduct)
                        <label class="mr-8">
                            <input type="radio" value="{{ $statusProduct->id }}"
                                wire:model="product.statusproduct_id">
                            {{ $statusProduct->name }}
                        </label>
                    @endforeach
                @else
                    <label class="mr-8">
                        <input type="radio" value="2" wire:model="product.statusproduct_id">
                        Deshabilitado
                    </label>
                @endif
            </div>
            @if ($subcategory_select->status == 1)
                <div class="text-center font-semibold mt-2 text-red-700">
                    La subcategoría a la que pertecene el producto esta deshabilitada, no se puede cambiar el estado del
                    producto. Habilite la subcategoría o cambie por otra para poder habilitarlo.
                </div>
            @endif
            <div class="flex justify-center">
                <x-jet-input-error for="statusproduct_id" />
            </div>
        </div>

        {{-- Nombre / Slug / SKU --}}
        <div class="grid sm:grid-cols-5 gap-6 mb-4">
            {{-- Nombre --}}
            <div class="sm:col-span-2">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model="product.name"
                    placeholder="Ingrese el nombre del producto" />
                <x-jet-input-error for="product.name" />
            </div>

            {{-- Slug --}}
            <div class="sm:col-span-2">
                <x-jet-label value="Slug" />
                <x-jet-input type="text" class="w-full bg-gray-200" wire:model="product.slug" disabled
                    placeholder="Nombre con el que se va a ver en la barra de direcciones" />
                <x-jet-input-error for="product.slug" />
            </div>

            {{-- SKU --}}
            <div>
                <x-jet-label value="SKU" />
                <x-jet-input type="text" class="w-full bg-gray-200" wire:model="product.SKU" disabled />
                <x-jet-input-error for="product.SKU" />
            </div>
        </div>

        {{-- Cargar imagenes --}}
        <div class="mb-4" wire:ignore>
            <x-jet-label value="Imágenes" />
            <form action="{{ route('admin.products.files', $product) }}" method="POST" class="dropzone"
                id="my-awesome-dropzone">
            </form>
        </div>
        {{-- Mostar imagenes --}}
        @if ($product->images->count() || !empty($imagesToSave))
            <section class="bg-white shadow-lg rounded-lg p-6 mb-4">
                <h1 class="text-lg text-center font-semibold mb-4">Imagenes del producto</h1>
                <ul class="flex flex-wrap">
                    @if ($product->images->count())
                        @foreach ($product->images as $image)
                            <li class="relative" wire:key="image--{{ $image->id }}">
                                <img class="w-32 object-cover mr-2" src="{{ Storage::url($image->url) }}"
                                    alt="">
                                <div class="absolute right-5 top-2 h-6 w-6 rounded-full bg-white text-center"
                                    wire:click="deleteImage({{ $image->id }})" wire:loading.attr="disabled"
                                    wire:target="deleteImage({{ $image->id }})">
                                    <i class="fas fa-trash-alt"></i>
                                </div>
                            </li>
                        @endforeach
                    @endif
                    @if (!empty($imagesToSave))
                        @foreach ($imagesToSave as $imageToSave)
                            <li class="relative">
                                <img class="w-32 object-cover mr-2" src="{{ Storage::url($imageToSave) }}"
                                    alt="">
                                <div class="absolute right-5 top-2 h-6 w-6 rounded-full bg-white text-center">
                                    <i class="fas fa-trash-alt"></i>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </section>
        @endif

        {{-- Descripción --}}
        <div class="mb-4">
            <x-jet-label value="Descripción" />
            <textarea class="w-full form-control" rows="4" wire:model="product.description" id="miEditor"></textarea>
            <x-jet-input-error for="product.description" />
        </div>

        {{-- Costo / Procentaje de ganancia / Precio / Cantidad --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-4">

            {{-- Costo --}}
            <div>
                <x-jet-label value="Costo" />
                <x-jet-input type="number" class="w-full" wire:model="product.cost"
                    placeholder="Ingrese el costo del producto" />
                <x-jet-input-error for="product.cost" />
            </div>

            {{-- Procentaje de ganancia --}}
            <div>
                <x-jet-label value="Procentaje de ganancia" />
                <x-jet-input type="number" class="w-full" wire:model="product.percent_profit"
                    placeholder="Ingrese el procentaje de ganancia del producto" />
                <x-jet-input-error for="product.percent_profit" />
            </div>

            {{-- Precio --}}
            <div>
                <x-jet-label value="Precio" />
                <x-jet-input type="number" class="w-full bg-gray-200" wire:model="product.price"
                    placeholder="Precio del producto" disabled />
                <x-jet-input-error for="product.price" />
            </div>

            {{-- Cantidad --}}
            <div>
                <x-jet-label value="Cantidad" />
                <x-jet-input type="number" class="w-full bg-gray-200" wire:model="product.quantity"
                    placeholder="Cantidad del producto" disabled />
                <x-jet-input-error for="product.quantity" />
            </div>

        </div>

        <div class="mt-2 text-lg font-semibold">Características Generales</div>
        <hr class="mb-2">
        {{-- Items --}}
        @if ($product->subcategory_id)
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-4">
                @foreach ($items as $i => $item)
                    <div class="mb-1">
                        <x-jet-label value="{{ $item->name }}" />
                        <select class="w-full form-control" wire:model='valuesItemsIds.{{ $i }}'>
                            <option value="" selected disabled>Seleccione una opción</option>
                            @foreach ($valuesItems[$i] as $valuesItem)
                                <option value="{{ $valuesItem['id'] }}">{{ $valuesItem['name'] }}</option>
                                {{-- Se usa [''] en vez del -> porque no es un objeto si no un array --}}
                            @endforeach
                        </select>
                        <x-jet-input-error for="valuesItemsIds.{{ $i }}" />
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Botones --}}
        <div class="hidden sm:flex mb-4">
            <div class="ml-auto">
                <x-button class="mr-4" color="red" wire:click="cancel">Cancelar</x-button>
                <x-button class="m-4 disabled" color="blue" wire:loading.attr="disabled"
                    wire:target="updateProduct" wire:click="updateProduct">
                    Actualizar
                </x-button>
            </div>
        </div>
        <div class="sm:hidden grid grid-cols-2 mb-4">
            <x-button width="w-full" color="red" wire:click="cancel">Cancelar</x-button>
            <x-button class="ml-2 disabled" width="w-full" color="blue" wire:loading.attr="disabled" wire:target="updateProduct"
                wire:click="updateProduct">
                Actualizar
            </x-button>
        </div>
    </div>
</div>
