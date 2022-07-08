@extends('adminlte::page')

@section('title', 'Wine Cup')

@section('content_header')
    <h1>Editar Permiso</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($permission,['route' => ['admin.permissions.update',$permission], 'method'=>'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder' =>'ingrese el nombre del permiso']) !!}
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::text('description', null, ['class'=>'form-control', 'placeholder' =>'ingrese una descripción del permiso']) !!}
                    @error('description')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                {!! Form::submit('Editar Permisos', ['class'=>'btn btn-success']) !!}
                <a class="ml-3 btn btn-danger" href="{{route('admin.permissions.index')}}">Cancelar</a>
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