@extends('adminlte::page')

@section('title', 'Wine Cup')

@section('content_header')
    <h1>Editar Proveedor</h1>
@stop

@section('content')
    @livewire('admin.receptiongood-edit', ['receptiongood' => $receptiongood], key($receptiongood->id))
@stop

@section('css')
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    {{-- Script para alertas --}}
    <script>
        Livewire.on('deleteValueItem', valueItemId => {
            Swal.fire({
                title: '¿Esta seguro?',
                text: 'Esta eliminando un valor de Item',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminarlo'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('admin.valueitem-crud', 'destroyValueItem', valueItemId)
                    Swal.fire(
                        '¡Eliminado!',
                        'Se elimino correctamente.',
                        'success'
                    )
                }
            })
        })

        Livewire.on('deleteItem', valueItemId => {
            Swal.fire({
                title: '¿Esta seguro?',
                text: 'Esta eliminando un Item y todos sus valores.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminarlo'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('admin.item', 'destroyItem', valueItemId)
                    Swal.fire(
                        '¡Eliminado!',
                        'Se elimino correctamente.',
                        'success'
                    )
                }
            })
        })
    </script>
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
