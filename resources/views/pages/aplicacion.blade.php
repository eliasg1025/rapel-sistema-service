@extends('layout')

@section('titulo')
    Panel Aplicación Movil | Grupo Verfrut
@endsection

@section('contenido')
    <div id="controlador-aplicacion"></div>
    <script>
        sessionStorage.setItem('data', JSON.stringify(@json($data)))
    </script>
@endsection
