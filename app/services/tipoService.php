<?php

namespace App\Services;

use App\Interfaces\ITipoService;
use App\Models\TipoModel;
use Libs\Database;

class TipoService implements ITipoService
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $result = TipoModel::select('IdTipo', 'Nombre')->get();
        return $result;
    }
    public function get(int $id)
    {
        $model = TipoModel::find($id);
        if ($model == null) {
            $model = new TipoModel();
        }
        return $model;
    }
    public function insert($obj)
    {
        $model = new TipoModel();
        $model->IdTipo = $obj->IdTipo;
        $model->Nombre = $obj->Nombre;
        return $model->save();
    }
    public function update($obj)
    {
        $model = TipoModel::find($obj->IdTipo);
        $model->IdTipo = $obj->IdTipo;
        $model->Nombre = $obj->Nombre;
        return $model->save();
    }
    public function delete(int $id)
    {
        $model = TipoModel::find($id);
        return $model->delete();
    }
}