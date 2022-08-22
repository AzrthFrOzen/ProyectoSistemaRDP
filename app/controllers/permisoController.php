<?php

namespace App\Controllers;

use App\Interfaces\IPermisoService;
use App\Interfaces\ITipoService;
use App\Services\PermisoService;
use App\Services\TipoService;
use Libs\Controller;
use Libs\Database;

class PermisoController extends Controller
{
    private readonly IPermisoService $service;
    private readonly ITipoService $tipoService;

    public function __construct(IPermisoService $service, ITipoService $tipoService)
    {
        $this->service = $service;
        $this->tipoService = $tipoService;
        $this->loadBlade();
    }

    public function index()
    {
        $data = $this->service->getAll();
        echo $this->blade->make('permiso.index', ['data' => $data])->render();
    }

    public function detail($param = null)
    {
        $id = isset($param[0]) ? $param[0] : 0;
        $IdTipo = isset($param[1]) ? $param[1] : 0;

        $data = $this->service->get($id);
        $tipo = (new TipoService(new Database()))->getAll();
        echo $this->blade->render('permiso.detail', [
            'data' => $data,
            'tipo' => $tipo,
            'IdTipo' => $IdTipo
        ]);
    }

    public function save()
    {
        $id = isset($_POST['IdPermiso']) ? intval($_POST['IdPermiso']) : 0;
        $obj = new \stdClass();
        $obj->IdPermiso = $id;
        $obj->IdTipo = $_POST['IdTipo'];
        $obj->Tablas = $_POST['Tablas'];

        if ($id > 0) {
            $rpta = $this->service->update($obj);
        } else {
            $rpta = $this->service->insert($obj);
        }

        if ($rpta) {
            $response = [
                'success' => true,
                'message' => 'Usuario guardado correctamente',
                'redirection' => URL . 'permiso/index'
            ];
        }

        echo json_encode($response);
    }

    public function delete($param = null)
    {
        $id = isset($param[0]) ? $param[0] : 0;
        if ($id > 0) {
            $rpta = $this->service->delete($id);
        }

        if ($rpta) {
            $response = [
                'success' => true,
                'message' => 'Usuario eliminado correctamente',
                'redirection' => URL . 'permiso/index'
            ];
        }
        echo json_encode($response);
    }
}
