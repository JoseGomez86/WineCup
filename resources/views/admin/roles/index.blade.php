@extends('adminlte::page')

@section('title', 'Wine Cup')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>  
    @endif
    <div class="card">
        @can('admin.roles.create')
            <div class="card-header">            
                <a class="btn btn-success" href="{{route('admin.roles.create')}}">Crear Rol</a>
            </div>
        @endcan
        <div class="card-body">
            <table class="table table-triped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Rol</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            @can('admin.roles.edit')
                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.roles.edit', $role)}}">Editar</a>
                                </td>                                
                            @endcan
                            @can('admin.roles.destroy')
                                <td width="10px">
                                    <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            @endcan
                        </tr>                 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop