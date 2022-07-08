@extends('adminlte::page')

@section('title', 'Wine Cup')

@section('content_header')
    <h1>Lista de Subcategorías</h1>
@stop

@section('content')
    @livewire('admin.subcategories-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')

@stop
