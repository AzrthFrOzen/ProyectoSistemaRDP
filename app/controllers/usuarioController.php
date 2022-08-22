<?php

namespace App\Controllers;

use App\Interfaces\ITipoService;
use App\Interfaces\IUsuarioService;
use App\Services\TipoService;
use App\Services\UsuarioService;
use Libs\Controller;
use Libs\Database;

class UsuarioController extends Controller
{
    private readonly IUsuarioService $service;
    private readonly ITipoService $tipoService;

    public function __construct(IUsuarioService $service, ITipoService $tipoService)
    {
        $this->service = $service;
        $this->tipoService = $tipoService;
        $this->loadBlade();
    }

    public function index()
    {
        $data = $this->service->getAll();
        echo $this->blade->make('usuario.index', ['data' => $data])->render();
    }

    public function detail($param = null)
    {
        $id = isset($param[0]) ? $param[0] : 0;
        $IdTipo = isset($param[1]) ? $param[1] : 0;

        $data = $this->service->get($id);
        $tipo = (new TipoService(new Database()))->getAll();
        echo $this->blade->render('usuario.detail', [
            'data' => $data,
            'tipo' => $tipo,
            'IdTipo' => $IdTipo
        ]);
    }

    public function save()
    {
        $id = isset($_POST['IdUsuario']) ? intval($_POST['IdUsuario']) : 0;
        $obj = new \stdClass();
        $obj->IdUsuario = $id;
        $obj->IdTipo = $_POST['IdTipo'];
        $obj->Usuario = $_POST['Usuario'];
        $obj->Clave = $_POST['Clave'];
        $obj->Correo = $_POST['Correo'];

        if ($id > 0) {
            $rpta = $this->service->update($obj);
        } else {
            $rpta = $this->service->insert($obj);
        }

        if ($rpta) {
            /*
            $response = [
                'success' => true,
                'message' => 'Usuario guardado correctamente',
                'redirection' => URL . 'usuario/index'
            ];
            */
            header("location:" . URL . "usuario");
        }

        //echo json_encode($response);

        //header("location:" . URL . "usuario");
    }

    public function delete($param = null)
    {
        $id = isset($param[0]) ? $param[0] : 0;
        $rpta = false;
        if ($id > 0) {
            $rpta = $this->service->delete($id);            
        }
        if ($rpta) {
            /*
            $response = [
                'success' => true,
                'message' => 'Usuario eliminado correctamente',
                'redirection' => URL . 'usuario/index',
                $id
            ];
            */
            header("location:" . URL . "usuario/index");
        }
        //echo json_encode($response);
    }
}
