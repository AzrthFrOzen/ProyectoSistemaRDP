@extends('layouts.template')

@section('title', 'Usuarios')

@section('content')
<div class="container">
        <form action="{{URL.'usuario/save'}}" method="post" id="myForm">
            <div class="form-group" hidden>
                <input type="hidden" name="IdUsuario" value="{{$data->IdUsuario}}">
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="Usuario"">Usuario</label>
                        <input type="text" placeholder="Nombre de usuario" name="Usuario" id="Usuario" value="{{$data->Usuario}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="Clave">Contraseña</label>
                        <input type="password" name="Clave" id="Clave" value="{{$data->Clave}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="Correo">Correo</label>
                        <input type="text" name="Correo" id="Correo" value="{{$data->Correo}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="IdTipo"">Nivel de Usuario</label>
                        <select name="IdTipo" id="Tipo">
                            @foreach ($tipo as $item)
                                <option value="{{$item->IdTipo}}" {{selected($item->IdTipo, $IdTipo)}}>
                                    {{$item->Nombre}}
                                </option>
                            @endforeach
                        </select>
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