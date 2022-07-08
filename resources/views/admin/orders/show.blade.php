@extends('adminlte::page')

@section('title', 'Wine Cup')

@section('content_header')
    <h1>Orden de compra número: {{$order->id}}</h1>
@stop

@section('content')
    @livewire('admin.orders-show', ['order' => $order])
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')

@stop
