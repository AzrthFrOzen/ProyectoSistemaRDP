<?php

namespace App\Services;

use App\Interfaces\ISolicitudService;
use App\Models\SolicitudModel;
use Libs\Database;

class SolicitudService implements ISolicitudService
{
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }
    public function getAll()
    {
        $result = SolicitudModel::select(
            'solicitudes.IdSolicitud',
            'solicitudes.IdServicio',
            'solicitudes.IdCliente',
            'solicitudes.Descripcion',
            'solicitudes.Estado',
            'servicios.Nombre as nombre',
            'clientes.Nombre as nombres'
        )
        ->join('servicios', 'solicitudes.IdServicio', '=', 'servicios.IdServicio')
        ->join('clientes', 'solicitudes.IdCliente', '=', 'clientes.IdCliente')
        ->get();
        return $result;
    }
    public function getAllSimple()
    {
        $result = SolicitudModel::select('IdSolicitud', 'Descripcion')->get();
        return $result;
    }
    public function get(int $id)
    {
        $model = SolicitudModel::find($id);
        if ($model == null) {
            $model = new SolicitudModel();
        }
        return $model;
    }
    public function insert($obj)
    {
        $model = new SolicitudModel();
        $model->IdSolicitud = $obj->IdSolicitud;
        $model->IdServicio = $obj->IdServicio;
        $model->IdCliente = $obj->IdCliente;
        $model->Descripcion = $obj->Descripcion;
        $model->Estado = $obj->Estado;
        return $model;
    }
    public function update($obj)
    {
        $model = SolicitudModel::find($obj->IdSolicitud);
        $model->IdSolicitud = $obj->IdSolicitud;
        $model->IdServicio = $obj->IdServicio;
        $model->IdCliente = $obj->IdCliente;
        $model->Descripcion = $obj->Descripcion;
        $model->Estado = $obj->Estado;
        return $model;
    }
    public function delete(int $id)
    {
        $model = SolicitudModel::find($id);
        return $model->delete();
    }
}