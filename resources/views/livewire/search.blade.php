<div class="flex-1 relative" x-data>
    <form action="{{route('search')}}" autocomplete="off">
        <x-jet-input name="name" wire:model="search" class="w-full" type="text" placeholder="Ingresa el producto que buscas" />
        <button class="absolute top-0 right-0 w-12 h-full bg-red-600 flex items-center justify-center rounded-r-md">
            <x-search size="35px" color="#ffffff"/>
        </button>
    </form>

    <div class="absolute w-full hidden" :class="{'hidden': !$wire.open}" @click.away="$wire.open=false">
        <div class="bg-white rounded-lg shadow mt-1">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                    <a href="{{route('products.show', $product)}}" class="flex">
                        <img class="w-16 h-12 object-cover" src="{{Storage::url($product->images->first()->url)}}" alt="" >
                        <div class="ml-4 text-gray-700">
                            <p class="text-lg font-semibold leading-5">{{$product->name}}</p>
                            <p>Categoria: {{$product->subcategory->category->name}}</p>
                        </div>
                    </a>                    
                @empty
                    <div class="flex">
                        <i class="far fa-frown-open text-lg"></i>
                        <p class="ml-2 text-lg leading-5">
                            No tenemos ningún producto que coincida con tu busqueda.
                        </p>  
                    </div>                                      
                @endforelse

            </div>
        </div>
    </div>
</div>
