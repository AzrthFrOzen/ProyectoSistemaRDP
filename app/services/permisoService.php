<?php

namespace App\Services;

use App\Interfaces\IPermisoService;
use App\Models\PermisoModel;
use Libs\Database;

class PermisoService implements IPermisoService
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $result = PermisoModel::select(
            'permisousuarios.IdPermiso',
            'permisousuarios.IdTipo',
            'permisousuarios.Tablas',
            'tipousuarios.Nombre as nombre'
        )
            ->join('tipousuarios', 'permisousuarios.IdTipo', '=', 'tipousuarios.IdTipo')
            ->get();
        return $result;
    }
    public function get(int $id)
    {
        $model = PermisoModel::find($id);
        if ($model == null) {
            $model = new PermisoModel();
        }
        return $model;
    }
    public function insert($obj)
    {
        $model = new PermisoModel();
        $model->IdPermiso = $obj->IdPermiso;
        $model->IdTipo = $obj->IdTipo;
        $model->Tablas = $obj->Tablas;
        return $model->save();
    }
    public function update($obj)
    {
        $model = PermisoModel::find($obj->IdPermiso);
        $model->IdPermiso = $obj->IdPermiso;
        $model->IdTipo = $obj->IdTipo;
        $model->Tablas = $obj->Tablas;
        return $model->save();
    }
    public function delete(int $id)
    {
        $model = PermisoModel::find($id);
        return $model->delete();
    }
}
