<?php

namespace App\Services;

use App\Interfaces\IEstadoService;
use App\Models\EstadoModel;
use Libs\Database;

class EstadoService implements IEstadoService
{
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getEstado()
    {
        $result = EstadoModel::select('IdEstado', 'Nombre')->get();
        return $result;
    }
}