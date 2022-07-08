<div>
    <div class="card">
        <div class="card-body">
            <div class="input-group mb-3">
                <input type="text" class="form-control" wire:model="search"
                    placeholder="Ingrese el nombre de la subcategoría que busca">
                <span class="input-group-text" id="basic-addon2"> <i class="fas fa-search"></i></span>
            </div>
            @if ($subcategories->count())
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th>Imágen</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $subcategory)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="ml-2">{{ $subcategory->name }}</div>
                                    </div>
                                </td>
                                <td>
                                    {{ $subcategory->slug }}
                                </td>

                                <td>
                                    <img style="" class="rounded-lg w-20" src="{{ Storage::url($subcategory->image) }}"
                                        alt="">
                                </td>


                                @if ($subcategory->status == 1)
                                    <td class="text-red-500 font-semibold">
                                        Deshabiltado
                                    </td>
                                @else
                                    <td class="text-green-500 font-semibold">
                                        Habilitado
                                    </td>
                                @endif


                                {{-- @can('admin.subcategories.edit') --}}
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('admin.subcategories.edit', $subcategory) }}">Editar</a>
                                </td>
                                {{-- @endcan --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="">
                    No hay subcategorías que coincidan con la busqueda...
                </div>
            @endif
        </div>
        @if ($subcategories->hasPages())
            <div class="card-footer">
                {{ $subcategories->links() }}
            </div>
        @endif
    </div>

</div>
