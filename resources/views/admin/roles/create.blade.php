@extends('adminlte::page')

@section('title', 'Wine Cup')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
                @include('admin.roles.partials.form')
                {!! Form::submit('Crear Rol', ['class'=>'btn btn-success']) !!}
                <a class="ml-3 btn btn-danger" href="{{route('admin.roles.index')}}">Cancelar</a>
            </div>
            {!! Form::close() !!}
   </div>
@stop