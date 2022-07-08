@extends('adminlte::page')

@section('title', 'Wine Cup')

@section('content_header')
    <h1>Asignar un rol</h1>
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route'=>['admin.roles.update',$role], 'method'=>'put']) !!}
                @include('admin.roles.partials.form')
                {!! Form::submit('Asignar rol', ['class'=>'btn btn-success mr-2']) !!}
                <a class="ml-3 btn btn-danger" href="{{route('admin.roles.index')}}">Cancelar</a>
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