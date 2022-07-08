@extends('adminlte::page')

@section('title', 'Wine Cup')

@section('content_header')
    <h1>Listado de ingresos de mercadería</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Proveedor</th>
                        <th>Fecha</th>
                        <th>Factura</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($receptiongoods as $receptiongood)
                        <tr>
                            <td>
                                {{ $receptiongood->supplier->fictitious_name }}
                            </td>
                            <td>
                                {{ $receptiongood->reception_dates }}
                            </td>
                            <td>
                                {{ $receptiongood->invoice }}
                            </td>

                            {{-- @can('admin.categories.edit') --}}
                            <td>
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('admin.receptiongoods.edit', $receptiongood) }}">Editar</a>
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
