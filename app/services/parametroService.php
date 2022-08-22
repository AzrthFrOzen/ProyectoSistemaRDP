<?php

namespace App\Services;

use App\Interfaces\IParametroService;
use App\Models\ParametroModel;
use Libs\Database;

class ParametroService implements IParametroService
{
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getParameter($type)
    {
        $result = ParametroModel::select('IdParametro', 'TipoParametro', 'NombreParametro')
        ->where('TipoParametro', '=', $type)
        ->get();
        return $result;
    }
}