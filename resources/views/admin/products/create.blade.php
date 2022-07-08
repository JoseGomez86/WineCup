@extends('adminlte::page')

@section('title', 'Wine Cup')

@section('content_header')
    <h1>Crear nuevo producto</h1>
@stop

@section('content')
    @livewire('admin.product-create')
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
    {{-- Script para Subir Imagenes con DropZone --}}
    <script>
        Dropzone.options.myAwesomeDropzone = {
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            dictDefaultMessage: "Arrastre una imagen al recuadro o haga click para cargar una nueva imagen. Se carga de a una imagen a la vez.",
            acceptedFiles: 'image/*',
            method: "post",
            paramName: "file",
            maxFilesize: 2, // MB
            complete: function(file) {
                this.removeFile(file);
            },
            queuecomplete: function() {
                Livewire.emit('refreshImages');
            }
        };
    </script>
@stop
