@extends('layouts.app')

@section('title', 'Empleados')

@php $activePage='empleados'; @endphp

@section('content')
@php
$columns = ['checkbox','Nombre','ID','Dirección','Teléfono','Ciudad','Departamento','actions'];
$rows = [
    ['checkbox'=>false,'Nombre'=>'Juanita González Uribe','ID'=>'123456','Dirección'=>'Calle Falsa 123','Teléfono'=>'3112345678','Ciudad'=>'Bogotá','Departamento'=>'Recursos Humanos','actions'=>true],
    ['checkbox'=>false,'Nombre'=>'Carlos Méndez','ID'=>'987654','Dirección'=>'Carrera 45 #23-12','Teléfono'=>'3123456789','Ciudad'=>'Medellín','Departamento'=>'Contabilidad','actions'=>true],
];
@endphp

<x-floating-table :columns="$columns" :rows="$rows"/>
@endsection
