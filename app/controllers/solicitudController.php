<?php

namespace App\Controllers;

use App\Interfaces\IClienteService;
use App\Interfaces\IServicioService;
use App\Interfaces\ISolicitudService;
use App\Services\ClienteService;
use App\Services\ServicioService;
use Libs\Controller;
use Libs\Database;

class SolicitudController extends Controller
{
    private readonly ISolicitudService $service;
    private readonly IServicioService $servicioService;
    private readonly IClienteService $clienteService;

    public function __construct(ISolicitudService $service, IServicioService $servicioService, IClienteService $clienteService) 
    {
        $this->service = $service;
        $this->servicioService = $servicioService;
        $this->clienteService = $clienteService;
        $this->loadBlade();
    }

    public function index()
    {
        $data = $this->service->getAll();
        echo $this->blade->make('solicitud.index', ['data' => $data])->render();
    }

    public function detail($param = null)
    {
        $id = isset($param[0]) ? $param[0] : 0;
        $IdServicio = isset($param[1]) ? $param[1] : 0;
        $IdCliente = isset($param[2]) ? $param[2] : 0;

        $data = $this->service->get($id);
        $servicio = (new ServicioService(new Database()))->getAll();
        $cliente = (new ClienteService(new Database()))->getAll();

        echo $this->blade->render('solicitud.detail', [
            'data' => $data,
            'servicio' => $servicio,
            'cliente' => $cliente,
            'IdServicio' => $IdServicio,
            'IdCliente' => $IdCliente
        ]);
    }

    public function save()
    {
        $id = isset($_POST['IdSolicitud']) ? intval($_POST['IdSolicitud']) : 0;
        $obj = new \stdClass();
        $obj->IdSolicitud = $id;
        $obj->IdServicio = $_POST['IdServicio'];
        $obj->IdCliente = $_POST['IdCliente'];
        $obj->Descripcion = $_POST['Descripcion'];
        $obj->Estado = $_POST['Estado'];

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
        header("location:" . URL . "solicitud/index");
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
                'redirection' => URL . 'solicitud/index'
            ];
        }
        echo json_encode($response);
    }
}