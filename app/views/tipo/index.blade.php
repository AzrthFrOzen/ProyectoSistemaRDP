@extends('layouts.template')

@section('title', 'Roles de Usuario')

@section('content')
<!--
    {{$_ENV['APP_URL']}}
    {{myEcho($data)}}
-->
<div class="containeer">
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
    <h3>Roles</h3>
    <hr>
    <br>
    <div class="row">
            <div class="col-2">
                <a href="{{URL.'tipo/detail'}}" is-modal="true" id="nuevo">Nuevo</a>
            </div>
        </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%;">ID</th>
                    <th scope="col" style="width: 45%;">ROL DE USUARIO</th>
                    <th scope="col" style="width: 35%;"></th>
                </tr>
            </thead>
            <body>
                @foreach ($data as $item)
                    <tr>
                        <td>{{$item->IdTipo}}</td>
                        <td>{{$item->Nombre}}</td>
                        <td>
                            <a class="btn btn-danger btn-sm" is-modal="true" href="<?=URL . "tipo/detail/{$item->IdTipo}" ?>"><i data-feather="edit-3"></i></a>
                            <a class="btn btn-info btn-sm" href="<?=URL . "tipo/delete/{$item->IdTipo}" ?>"><i data-feather="trash-2"></i></a>
                        </td>
                    </tr>
                @endforeach
            </body>
        </table>
    </div>
</div>

    @component('layouts.components.modal')
        @slot('title', 'Roles - Agregar')            
        @slot('size', MODAL_LG)
    @endcomponent
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.19/dist/sweetalert2.min.js"></script>
    <script src="{{URL}}js/scripts/modal_crud.js"></script>
@endsection