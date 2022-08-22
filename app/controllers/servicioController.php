<?php

namespace App\Controllers;

use App\Interfaces\IServicioService;
use Libs\Controller;

class ServicioController extends Controller
{
    private readonly IServicioService $service;

    public function __construct(IServicioService $service) {
        $this->service = $service;
        $this->loadBlade();
    }

    public function index()
    {
        $data = $this->service->getAll();
        echo $this->blade->make('servicio.index', ['data' => $data])->render();
    }

    public function detail($param = null)
    {
        $id = isset($param[0]) ? $param[0] : 0;
        $data = $this->service->get($id);
        echo $this->blade->render('servicio.detail', ['data' => $data]);
    }

    public function save()
    {
        $id = isset($_POST['IdServicio']) ? intval($_POST['IdServicio']) : 0;
        $obj = new \stdClass();
        $obj->IdServicio = $id;
        $obj->Nombre = $_POST['Nombre'];
        $obj->Descripcion = $_POST['Descripcion'];

        if ($id > 0) {
            $rpta = $this->service->update($obj);
        } else {
            $rpta = $this->service->insert($obj);
        }
/*
        if ($rpta) {
            $response = [
                'success' => true,
                'message' => 'Servicio guardado correctamente',
                'redirection' => URL . 'servicio/index'
            ];
        }
        echo json_encode($response);
*/
        header("location:" . URL . "servicio");
    }

    public function delete($param = null)
    {
        $id = isset($param[0]) ? $param[0] : 0;
        if ($id > 0) {
            if ($id > 0) {
                $rpta = $this->service->delete($id);
            }

            if ($rpta) {
                /*
                $response = [
                    'success' => true,
                    'message' => 'Usuario eliminado correctamente',
                    'redirection' => URL . 'cliente/index'
                ];
                */
                header("location:" . URL . "servicio");
            }
            //echo json_encode($response);
        }
    }
}