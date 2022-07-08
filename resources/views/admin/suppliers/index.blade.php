@extends('adminlte::page')

@section('title', 'Wine Cup')

@section('content_header')
    <h1>Lista de Proveedores</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre de fantasía</th>
                        <th>Razón Social</th>
                        <th>Cuit</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>
                                {{ $supplier->fictitious_name }}
                            </td>
                            <td>
                                {{ $supplier->trade_name }}
                            </td>
                            <td>
                                {{ $supplier->cuit }}
                            </td>
                            <td>
                                {{ $supplier->phone }}
                            </td>
                            <td>
                                {{ $supplier->address }}
                            </td>

                            {{-- @can('admin.categories.edit') --}}
                            <td>
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('admin.suppliers.edit', $supplier) }}">Editar</a>
                            </td>
                            {{-- @endcan --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')

@stop
