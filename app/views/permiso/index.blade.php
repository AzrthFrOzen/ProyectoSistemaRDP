@extends('layouts.template')

@section('title', 'Permiso')

@section('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.19/dist/sweetalert2.min.css">
@endsection

@section('content')
<!--
    {{$_ENV['APP_URL']}}
    {{myEcho($data)}}
-->
<section class="content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Inicio</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                Calendario
            </button>
        </div>
    </div>
    <h3>Usuarios</h3>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%;">ID</th>
                    <th scope="col" style="width: 15%;">ROL</th>
                    <th scope="col" style="width: 30%;">USUARIO</th>
                    <th scope="col" style="width: 30%;">CORREO</th>
                    <th scope="col" style="width: 15%;"></th>
                </tr>
            </thead>
            <body>
                @foreach ($data as $item)
                    <tr>
                        <td>{{$item->IdUsuario}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->Usuario}}</td>
                        <td>{{$item->Correo}}</td>
                        <td>
                            <a class="btn btn-danger btn-sm" is-modal="true" href="<?=URL . "permiso/detail/{$item->IdPermiso}/{$item->IdTipo}" ?>"><i data-feather="edit-3"></i></a>
                            <button class="btn btn-primary btn-sm" my-name="{{$item->Nombre}}" my-action="<?=URL . "permiso/delete/{$item->IdPermiso}" ?>" onclick="remove(this)"><i data-feather="trash-2"></i></button>
                        </td>
                    </tr>
                @endforeach
            </body>
        </table>
    </div>
</section>
@endsection