<div>
    <div class="card">
        <div class="card-body">
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
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                <div class="d-flex">
                                    <span class="inline-block w-8 text-center mr-2">
                                        {!! $category->icon !!}
                                    </span>
                                    <div class="ml-2">{{ $category->name }}</div>
                                </div>
                            </td>
                            <td>
                                {{ $category->slug }}
                            </td>

                            <td>
                                <img style="" class="rounded-lg w-20" 
                                    src="{{ Storage::url($category->image) }}" alt="">
                            </td>

                            <td>
                                @if ($category->status==1)
                                    Deshabilitado
                                @else
                                    Habilitado
                                @endif
                            </td>

                            {{-- @can('admin.categories.edit') --}}
                            <td>
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('admin.categories.edit', $category) }}">Editar</a>
                            </td>
                            {{-- @endcan --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
