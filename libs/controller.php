<?php

namespace Libs;

class Controller
{
    protected string $ruta;
    public function __construct()
    {
        $this->ruta =__DIR__ . '../app/views/templates/layout.php';
    }
}
