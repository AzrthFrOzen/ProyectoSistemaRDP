<?php

namespace App\Services;

use App\Interfaces\IUsuarioService;
use App\Models\UsuarioModel;
use Libs\Database;

class UsuarioService implements IUsuarioService
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }
    public function getAll()
    {
        $result = UsuarioModel::select(
            'usuarios.IdUsuario',
            'usuarios.IdTipo',
            'usuarios.Usuario',
            'usuarios.Clave',
            'usuarios.Correo',
            'tipousuarios.Nombre as nombre'
        )
            ->join('tipousuarios', 'usuarios.IdTipo', '=', 'tipousuarios.IdTipo')
            ->get();
        return $result;
    }

    public function getAllSimple()
    {
        $result = UsuarioModel::select('IdUsuario', 'Usuario')->get();
        return $result;
    }

    public function get(int $id)
    {
        $model = UsuarioModel::find($id);
        if ($model == null) {
            $model = new UsuarioModel();
        }
        return $model;
    }

    public function insert($obj)
    {
        $model = new UsuarioModel();
        $model->IdUsuario = $obj->IdUsuario;
        $model->IdTipo = $obj->IdTipo;
        $model->Usuario = $obj->Usuario;
        $model->Clave = $obj->Clave;
        $model->Correo = $obj->Correo;
        return $model->save();
    }

    public function update($obj)
    {
        $model = UsuarioModel::find($obj->IdUsuario);
        $model->IdUsuario = $obj->IdUsuario;
        $model->IdTipo = $obj->IdTipo;
        $model->Usuario = $obj->Usuario;
        $model->Clave = $obj->Clave;
        $model->Correo = $obj->Correo;
        return $model->save();
    }
    public function delete(int $id)
    {
        $model = UsuarioModel::find($id);
        
        return $model->delete();
    }
}
