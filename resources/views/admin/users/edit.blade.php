@extends('adminlte::page')

@section('title', 'Wine Cup')

@section('content_header')
    <h1>Asignar rol/permiso a un Usuario</h1>
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <p class="h5">Nombre</p>
            <p class="form-control">{{$user->name}}</p>

            <h2 class="h5"><ins><strong>Listado de roles</strong></ins></h2>
            <h2 class="h6">Seleccione el/los rol/es</h2>
            {!! Form::model($user, ['route'=>['admin.users.update',$user], 'method'=>'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach
                <h2 class="h5"><ins><strong>Listado de permisos</strong></ins></h2>
                <h2 class="h6">Seleccione el/los permiso/s</h2>
                @foreach ($permissions as $permission)
                    <div>
                        <label>
                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr1']) !!}
                            {{$permission->description}}
                        </label>
                    </div>
                @endforeach

                {!! Form::submit('Guardar', ['class'=>'btn btn-success mr-2']) !!}
                <a class="ml-3 btn btn-danger" href="{{route('admin.users.index')}}">Cancelar</a>
            {!! Form::close() !!}
        </div>
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop