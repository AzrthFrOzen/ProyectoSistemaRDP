<?php

namespace App\Controllers;

use App\Interfaces\ITipoService;
use App\Services\TipoService;
use Libs\Controller;

class TipoController extends Controller
{
    private readonly ITipoService $service;

    public function __construct(ITipoService $service)
    {
        $this->service = $service;
        $this->loadBlade();
    }

    public function index()
    {
        $data = $this->service->getAll();
        echo $this->blade->make('tipo.index', ['data' => $data])->render();
    }

    public function detail($param = null)
    {
        $id = isset($param[0]) ? $param[0] : 0;
        $data = $this->service->get($id);
        echo $this->blade->render('tipo.detail', ['data' => $data]);
    }

    public function save()
    {
        $id = isset($_POST['IdTipo']) ? intval($_POST['IdTipo']) : 0;
        $obj = new \stdClass();
        $obj->IdTipo = $id;
        $obj->Nombre = $_POST['Nombre'];

        if ($id > 0) {
            $rpta = $this->service->update($obj);
        } else {
            $rpta = $this->service->insert($obj);
        }

        if ($rpta) {
            $response = [
                'success' => true,
                'message' => 'Nivel de usuario guardado correctamente',
                'redirection' => URL . 'tipo/index'
            ];
        }

        echo json_encode($response);
        header("location:" . URL . "tipo/index");
    }

    public function delete($param = null)
    {
        $id = isset($param[0]) ? $param[0] : 0;
        if ($id > 0) {
            $this->service->delete($id);
        }
/*
        if ($rpta) {
            $response = [
                'success' => true,
                'message' => 'Nivel de usuario eliminado correctamente',
                'redirection' => URL . 'tipo/index'
            ];
        }
        echo json_encode($response);
*/
        header("location:" . URL . "tipo/index");
    }
}
