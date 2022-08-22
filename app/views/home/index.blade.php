@extends('layouts.template')

@section('title', 'Inicio')

@section('name')
    <link href="<?= URL . 'css/dashboard.css' ?>" rel="stylesheet">
@endsection

@section('content')
{{$_ENV['APP_URL']}}
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
    <h3>Pendientes</h3>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%;">Nº</th>
                    <th scope="col" style="width: 15%;">Nombre</th>
                    <th scope="col" style="width: 15%;">Apellido</th>
                    <th scope="col" style="width: 10%;">DNI</th>
                    <th scope="col" style="width: 30%;">Trámite</th>
                    <th scope="col" style="width: 20%;">Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Cesar</td>
                    <td>Piña</td>
                    <td>951753258</td>
                    <td>Solicitud de Licencia de Tiro Deportivo</td>
                    <td>En solicitud de documentos</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection

@section('scripts')
    <script src="<?= URL . 'js/bootstrap.bundle.min.js' ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="http://localhost/ProyectoSistemaRDP/public/js/dashboard.js"></script>
@endsection