@extends('adminlte::page')

@section('title', 'Wine Cup')

@section('content_header')
    <h1>Recepción de mercadería</h1>
@stop

@section('content')
    @livewire('admin.receptiongood-create')
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
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
