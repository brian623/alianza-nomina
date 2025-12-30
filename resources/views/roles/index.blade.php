@extends('layouts.app')

@section('title', 'Cargos')

@php $activePage='cargos'; @endphp

@section('content')


<x-floating-table :columns="$columns" :rows="$rows"/>
@endsection
