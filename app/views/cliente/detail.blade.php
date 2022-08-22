@extends('layouts.template')

@section('title', 'Clientes')

@section('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.19/dist/sweetalert2.min.css">
@endsection

@section('content')
    <div class="container">
        <form action="{{URL.'cliente/save'}}" method="post" id="myForm">
            <div class="form-group" hidden>
                <input type="hidden" name="IdCliente" value="{{$data->IdCliente}}">
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="IdUsuario"">Usuario</label>
                        <select name="IdUsuario" id="IdUsuario">
                            @foreach ($usuario as $item)
                                <option value="{{$item->IdUsuario}}" {{selected($item->IdUsuario, $IdUsuario)}}>
                                    {{$item->Usuario}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Nombre"">Nombre</label>
                        <input type="text" placeholder="Nombre" name="Nombre" id="Nombre" value="{{$data->Nombre}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="Apellido">Apellidos</label>
                        <input type="text" name="Apellido" id="Apellido" value="{{$data->Apellido}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="IdDoc"">Tipo de documento</label>
                        <select name="IdDoc" id="IdDoc">
                            @foreach ($tipodocumento as $item)
                                <option value="{{$item->IdDoc}}" {{selected($item->IdDoc, $IdDoc)}}>
                                    {{$item->Nombre}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="NroDoc">Número de Documento</label>
                        <input type="text" name="NroDoc" id="NroDoc" value="{{$data->NroDoc}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="RUC">RUC</label>
                        <input type="text" name="RUC" id="RUC" value="{{$data->RUC}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="Telefono">Teléfono</label>
                        <input type="text" name="Telefono" id="Telefono" value="{{$data->Telefono}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="Correo">Correo</label>
                        <input type="text" name="Correo" id="Correo" value="{{$data->Correo}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="Direccion">Dirección</label>
                        <input type="text" name="Direccion" id="Direccion" value="{{$data->Direccion}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="Departamento">Departamento</label>
                        <input type="text" name="Departamento" id="Departamento" value="{{$data->Departamento}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="Provincia">Provincia</label>
                        <input type="text" name="Provincia" id="Provincia" value="{{$data->Provincia}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="Distrito">Distrito</label>
                        <input type="text" name="Distrito" id="Distrito" value="{{$data->Distrito}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="LugarNac"">Lugar de Nacimiento</label>
                        <input type="text" name="LugarNac" id="LugarNac" value="{{$data->LugarNac}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="FecNac"">Fecha de Nacimiento</label>
                        <input type="date" name="FecNac" id="FecNac" value="{{$data->FecNac}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="IdEstado"">Estado civil</label>
                        <select name="IdEstado" id="IdEstado">
                            @foreach ($estadocivil as $item)
                                <option value="{{$item->IdEstado}}" {{selected($item->IdEstado, $IdEstado)}}>
                                    {{$item->Nombre}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Conyuge">Conyuge</label>
                        <input type="text" name="Conyuge" id="Conyuge" value="{{$data->Conyuge}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="GradoInstr">GradoInstr</label>
                        <input type="text" name="GradoInstr" id="GradoInstr" value="{{$data->GradoInstr}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="Ocupacion">Ocupacion</label>
                        <input type="text" name="Ocupacion" id="Ocupacion" value="{{$data->Ocupacion}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="LugarTrabj">Lugar de Trabajo</label>
                        <input type="text" name="LugarTrabj" id="LugarTrabj" value="{{$data->LugarTrabj}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="DireccionTrabj">Dirección de Trabajo</label>
                        <input type="text" name="DireccionTrabj" id="DireccionTrabj" value="{{$data->DireccionTrabj}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="NombrePadre">Nombre del Padre</label>
                        <input type="text" name="NombrePadre" id="NombrePadre" value="{{$data->NombrePadre}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="NombreMadre">Nombre de la Madre</label>
                        <input type="text" name="NombreMadre" id="NombreMadre" value="{{$data->NombreMadre}}">
                        <div class="messages"></div>
                    </div>
                    <div class="form-group">
                        <label for="NombreHno">Nombre Hermano/s</label>
                        <input type="text" name="NombreHno" id="NombreHno" value="{{$data->NombreHno}}">
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