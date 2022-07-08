@extends('adminlte::page')

@section('title', 'Wine Cup')

@section('content_header')
    <h1>Crear nuevo permiso</h1>
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.permissions.store']) !!}
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
                {!! Form::submit('Crear Permisos', ['class'=>'btn btn-success']) !!}
                <a class="ml-3 btn btn-danger" href="{{route('admin.permissions.index')}}">Cancelar</a>
            </div>
            {!! Form::close() !!}
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop