<div>
    <div class="card">
        <div class="card-header">
            <a class="btn btn-success" href="{{route('admin.permissions.create')}}">Crear Permiso</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{$permission->id}}</td>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->description}}</td>
                            <td width="10px">
                                <a class="btn btn-sm btn-primary " href="{{route('admin.permissions.edit', $permission)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.permissions.destroy', $permission)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$permissions->links()}}
        </div>
    </div>
</div>