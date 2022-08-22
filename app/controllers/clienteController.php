<?php

namespace App\Controllers;

use App\Interfaces\IClienteService;
use App\Interfaces\IDocumentoService;
use App\Interfaces\IEstadoService;
use App\Interfaces\IUsuarioService;
use App\Services\DocumentoService;
use App\Services\EstadoService;
use App\Services\UsuarioService;
use Libs\Controller;
use Libs\Database;
use stdClass;

class ClienteController extends Controller
{
    private readonly IClienteService $service;
    private readonly IUsuarioService $usuarioService;
    private readonly IEstadoService $estadoService;
    private readonly IDocumentoService $documentoService;

    public function __construct(IClienteService $service, IUsuarioService $usuarioService, IEstadoService $estadoService, IDocumentoService $documentoService)
    {
        $this->service = $service;
        $this->usuarioService = $usuarioService;
        $this->estadoService = $estadoService;
        $this->documentoService = $documentoService;
        $this->loadBlade();
    }

    public function index()
    {
        $data = $this->service->getAll();
        echo $this->blade->make('cliente.index', ['data' => $data])->render();
    }

    public function detail($param = null)
    {
        $id = isset($param[0]) ? $param[0] : 0;
        $IdUsuario = isset($param[1]) ? $param[1] : 0;
        $IdDoc = isset($param[2]) ? $param[2] : 0;
        $IdEstado = isset($param[3]) ? $param[3] : 0;

        $data = $this->service->get($id);
        $usuario = (new UsuarioService(new Database()))->getAll();
        $tipodocumento = (new DocumentoService(new Database()))->getDocumento();
        $estadocivil = (new EstadoService(new Database()))->getEstado();
        echo $this->blade->render('cliente.detail',[
            'data' => $data,
            'usuario' => $usuario,
            'tipodocumento' => $tipodocumento,
            'estadocivil' => $estadocivil,
            'IdUsuario' => $IdUsuario,
            'IdDoc' => $IdDoc,
            'IdEstado' => $IdEstado
        ]);
    }

    public function save()
    {
        $id = isset($_POST['IdCliente']) ? intval($_POST['IdCliente']) : 0;
        $obj = new \stdClass();
        $obj->IdCliente = $id;
        $obj->IdUsuario = $_POST['IdUsuario'];
        $obj->Nombre = $_POST['Nombre'];
        $obj->Apellido = $_POST['Apellido'];
        $obj->IdDoc = $_POST['IdDoc'];
        $obj->NroDoc = $_POST['NroDoc'];
        $obj->RUC = $_POST['RUC'];
        $obj->Telefono = $_POST['Telefono'];
        $obj->Correo = $_POST['Correo'];
        $obj->Direccion = $_POST['Direccion'];
        $obj->Departamento = $_POST['Departamento'];
        $obj->Provincia = $_POST['Provincia'];
        $obj->Distrito = $_POST['Distrito'];
        $obj->LugarNac = $_POST['LugarNac'];
        $obj->FecNac = $_POST['FecNac'];
        $obj->IdEstado = $_POST['IdEstado'];
        $obj->Conyuge = $_POST['Conyuge'];
        $obj->GradoInstr = $_POST['GradoInstr'];
        $obj->Ocupacion = $_POST['Ocupacion'];
        $obj->LugarTrabj = $_POST['LugarTrabj'];
        $obj->DireccionTrabj = $_POST['DireccionTrabj'];
        $obj->NombrePadre = $_POST['NombrePadre'];
        $obj->NombreMadre = $_POST['NombreMadre'];
        $obj->NombreHno = $_POST['NombreHno'];

        if ($id > 0)
        {
            $rpta = $this->service->update($obj);
        }
        else
        {
            $rpta = $this->service->insert($obj);
        }

        if($rpta)
        {
            header("location:" . URL . "cliente/index");
        }
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
                echo json_encode($response);
                */
                header("location:" . URL . "cliente/index");
            }
            
        }
    }
}