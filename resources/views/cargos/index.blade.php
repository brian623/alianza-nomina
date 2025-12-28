@extends('layouts.app')

@section('title', 'Cargos')

@php $activePage='cargos'; @endphp

@section('content')
@php
$columns = ['checkbox','Nombre','ID','Área','Cargo','Rol','Jefe','actions'];
$rows = [
    ['checkbox'=>false,'Nombre'=>'Jhon Pérez','ID'=>'10184478545','Área'=>'Marketing y estrategias','Cargo'=>'Director Creativo','Rol'=>'Jefe','Jefe'=>'Elisa Gómez','actions'=>true],
    ['checkbox'=>false,'Nombre'=>'María López','ID'=>'10184478546','Área'=>'Finanzas','Cargo'=>'Analista Financiero','Rol'=>'Colaborador','Jefe'=>'Jhon Pérez','actions'=>true],
];
@endphp

<x-floating-table :columns="$columns" :rows="$rows"/>
@endsection
