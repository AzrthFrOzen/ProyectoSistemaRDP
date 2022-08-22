<?php

use App\Services\DocumentoService;
use App\Services\ClienteService;
use App\Services\EstadoService;
use App\Services\PermisoService;
use App\Services\ServicioService;
use App\Services\SolicitudService;
use App\Services\TipoService;
use App\Services\UsuarioService;
use DI\Container;
use Libs\Database;

return [
    'iservicioservice' => function (Container $c)
    {
        return new ServicioService($c->get(Database::class));
    },
    'itiposervice' => function (Container $c)
    {
        return new TipoService($c->get(Database::class));
    },
    'iusuarioservice' => function (Container $c)
    {
        return new UsuarioService($c->get(Database::class));
    },
    'ipermisoservice' => function (Container $c)
    {
        return new PermisoService($c->get(Database::class));
    },
    'iclienteservice' => function (Container $c) 
    {
        return new ClienteService($c->get(Database::class));
    },
    'iestadoservice' => function (Container $c) 
    {
        return new EstadoService($c->get(Database::class));
    },
    'idocumentoservice' => function (Container $c)
    {
        return new DocumentoService($c->get(Database::class));
    },
    'isolicitudservice' => function (Container $c)
    {
        return new SolicitudService($c->get(Database::class));
    }
];