<?php

namespace App\Services;

use App\Interfaces\IDocumentoService;
use App\Models\DocumentoModel;
use Libs\Database;

class DocumentoService implements IDocumentoService
{
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getDocumento()
    {
        $result = DocumentoModel::select('IdDoc', 'Nombre')->get();
        return $result;
    }
}