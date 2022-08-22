<?php

namespace App\Services;

use App\Interfaces\IClienteService;
use App\Models\ClienteModel;
use Libs\Database;

class ClienteService implements IClienteService
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $result = ClienteModel::select(
            'clientes.IdCliente',
            'clientes.IdUsuario',
            'clientes.Nombre',
            'clientes.Apellido',
            'clientes.IdDoc',
            'clientes.NroDoc',
            'clientes.RUC',
            'clientes.Telefono',
            'clientes.Correo',
            'clientes.Direccion',
            'clientes.Departamento',
            'clientes.Provincia',
            'clientes.Distrito',
            'clientes.LugarNac',
            'clientes.FecNac',
            'clientes.IdEstado',
            'clientes.Conyuge',
            'clientes.GradoInstr',
            'clientes.Ocupacion',
            'clientes.LugarTrabj',
            'clientes.DireccionTrabj',
            'clientes.NombrePadre',
            'clientes.NombreMadre',
            'clientes.NombreHno',
            'tipodocumento.IdDoc as documento',
            'estadocivil.IdEstado as estado',
            'usuarios.Usuario as usuario'
        )
        ->join('tipodocumento', 'clientes.IdDoc', '=', 'tipodocumento.IdDoc')
        ->join('estadocivil', 'clientes.IdEstado', '=', 'estadocivil.IdEstado')
        ->join('usuarios', 'clientes.IdUsuario', '=', 'usuarios.IdUsuario')
        ->get();
        return $result;
    }
    public function getAllSimple()
    {
        $result = ClienteModel::select('IdCliente', 'Nombre')->get();
        return $result;
    }
    public function get(int $id)
    {
        $model = ClienteModel::find($id);
        if ($model == null)
        {
            $model = new ClienteModel();
        }
        return $model;
    }
    public function insert($obj)
    {
        $model = new ClienteModel();
        $model->IdCliente = $obj->IdCliente;
        $model->IdUsuario = $obj->IdUsuario;
        $model->Nombre = $obj->Nombre;
        $model->Apellido = $obj->Apellido;
        $model->IdDoc = $obj->IdDoc;
        $model->NroDoc = $obj->NroDoc;
        $model->RUC = $obj->RUC;
        $model->Telefono = $obj->Telefono;
        $model->Correo = $obj->Correo;
        $model->Direccion = $obj->Direccion;
        $model->Departamento = $obj->Departamento;
        $model->Provincia = $obj->Provincia;
        $model->Distrito = $obj->Distrito;
        $model->LugarNac = $obj->LugarNac;
        $model->FecNac = $obj->FecNac;
        $model->IdEstado = $obj->IdEstado;
        $model->Conyuge = $obj->Conyuge;
        $model->GradoInstr = $obj->GradoInstr;
        $model->Ocupacion = $obj->Ocupacion;
        $model->LugarTrabj = $obj->LugarTrabj;
        $model->DireccionTrabj = $obj->DireccionTrabj;
        $model->NombrePadre = $obj->NombrePadre;
        $model->NombreMadre = $obj->NombreMadre;
        $model->NombreHno = $obj->NombreHno;
        return $model->save();
    }
    public function update($obj)
    {
        $model = ClienteModel::find($obj->IdCliente);
        $model->IdCliente = $obj->IdCliente;
        $model->IdUsuario = $obj->IdUsuario;
        $model->Nombre = $obj->Nombre;
        $model->Apellido = $obj->Apellido;
        $model->IdDoc = $obj->IdDoc;
        $model->NroDoc = $obj->NroDoc;
        $model->RUC = $obj->RUC;
        $model->Telefono = $obj->Telefono;
        $model->Correo = $obj->Correo;
        $model->Direccion = $obj->Direccion;
        $model->Departamento = $obj->Departamento;
        $model->Provincia = $obj->Provincia;
        $model->Distrito = $obj->Distrito;
        $model->LugarNac = $obj->LugarNac;
        $model->FecNac = $obj->FecNac;
        $model->IdEstado = $obj->IdEstado;
        $model->Conyuge = $obj->Conyuge;
        $model->GradoInstr = $obj->GradoInstr;
        $model->Ocupacion = $obj->Ocupacion;
        $model->LugarTrabj = $obj->LugarTrabj;
        $model->DireccionTrabj = $obj->DireccionTrabj;
        $model->NombrePadre = $obj->NombrePadre;
        $model->NombreMadre = $obj->NombreMadre;
        $model->NombreHno = $obj->NombreHno;
        return $model->save();
    }
    public function delete(int $id)
    {
        $model = ClienteModel::find($id);
        return $model->delete();
    }
}