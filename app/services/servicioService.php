<?php

namespace App\Services;

use App\Interfaces\IServicioService;
use App\Models\ServicioModel;
use Libs\Database;

class ServicioService implements IServicioService
{

    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $result = ServicioModel::select(
            'servicios.IdServicio',
            'servicios.Nombre',
            'servicios.Descripcion'
        )->get();
        return $result;
    }
    public function getAllSimple()
    {
        $result = ServicioModel::select('servicios.IdServicio', 'servicios.Nombre')->get();
        return $result;
    }
    public function get(int $id)
    {
        $model = ServicioModel::find($id);
        if ($model == null) {
            $model = new ServicioModel();
        }
        return $model;
    }
    public function insert($obj)
    {
        $model = new ServicioModel();
        $model->IdServicio = $obj->IdPermiso;
        $model->Nombre = $obj->Nombre;
        $model->Descripcion = $obj->Descripcion;
        return $model->save();
    }
    public function update($obj)
    {
        $model = ServicioModel::find($obj->IdServicio);
        $model->IdServicio = $obj->IdPermiso;
        $model->Nombre = $obj->Nombre;
        $model->Descripcion = $obj->Descripcion;
        return $model->save();
    }
    public function delete(int $id)
    {
        $model = ServicioModel::find($id);
        return $model->delete();
    }
}