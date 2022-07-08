@extends('adminlte::page')

@section('title', 'Wine Cup')

@section('content_header')
    <h1>Crear nueva categoría</h1>
@stop

@section('content')
    @livewire('admin.category-create')
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    {{-- Script para alertas --}}
    <script>
        Livewire.on('alert', function(title, message, type) {
            Swal.fire(
                title,
                message,
                type
            )
        })
    </script>
@stop
