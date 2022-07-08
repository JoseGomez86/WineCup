<div>
    <div class="card">
        <div class="card-body">
            <div class="input-group mb-3">
                <input type="text" class="form-control" wire:model="search"
                    placeholder="Ingrese el nombre del producto que busca">
                <span class="input-group-text" id="basic-addon2"> <i class="fas fa-search"></i></span>
            </div>
            @if ($products->count())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Subategoría</th>
                            <th>Estado</th>
                            <th>Stock</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        @if ($product->images->count())
                                            <img style="" class="rounded-lg w-20"
                                                src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                        @else
                                            <img style="" class="rounded-lg w-20"
                                                src="{{ Storage::url('/products/producto-sin-imagen.png') }}" alt="">
                                        @endif

                                        <div class="ml-2">{{ $product->name }}</div>
                                    </div>
                                </td>
                                <td>{{ $product->subcategory->category->name }}</td>
                                <td>{{ $product->subcategory->name }}</td>
                                @switch($product->statusproduct_id)
                                    @case(1)
                                        <td class="text-green-500 font-semibold">
                                            {{ $product->statusproduct->name }}
                                        </td>
                                    @break

                                    @case(2)
                                        <td class="text-red-500 font-semibold">
                                            {{ $product->statusproduct->name }}
                                        </td>
                                    @break

                                    @case(3)
                                        <td class="text-blue-500 font-semibold">
                                            {{ $product->statusproduct->name }}
                                        </td>
                                    @break

                                    @default
                                        <td class="text-yellow-400 font-semibold">
                                            {{ $product->statusproduct->name }}
                                        </td>
                                @endswitch
                                <td>{{ $product->quantity }}</td>
                                <td>$ {{ $product->price }}</td>
                                {{-- @can('admin.products.edit') --}}
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('admin.products.edit', $product) }}">Editar</a>
                                </td>
                                {{-- @endcan --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="">
                    No hay productos que coincidan con la busqueda...
                </div>
            @endif

        </div>
        @if ($products->hasPages())
            <div class="card-footer">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
