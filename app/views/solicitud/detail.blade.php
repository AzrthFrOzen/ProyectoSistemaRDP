@extends('layouts.template')

@section('title', 'Usuarios')

@section('content')

<div class="container">
        <form action="{{URL.'solicitud/save'}}" method="post" id="myForm">
            <div class="form-group" hidden>
                <input type="hidden" name="IdUsuario" value="{{$data->IdSolicitud}}">
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="IdServicio"">Servicio contratado</label>
                        <select name="IdServicio" id="IdServicio">
                            @foreach ($servicio as $item)
                                <option value="{{$item->IdServicio}}" {{selected($item->IdServicio, $IdServicio)}}>
                                    {{$item->Nombre}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="IdCliente"">Cliente</label>
                        <select name="IdCliente" id="IdCliente">
                            @foreach ($tipo as $item)
                                <option value="{{$item->IdCliente}}" {{selected($item->IdCliente, $IdCliente)}}>
                                    {{$item->Nombre}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Descripcion"">Descripción</label>
                        <input type="text" name="Descripcion" id="Descripcion" value="{{$data->Descripcion}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="Estado"">Descripción</label>
                        <input type="text" name="Estado" id="Estado" value="{{$data->Estado}}">
                        <div class="messages"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('scripts')

@endsection