<?php

namespace App\Controllers;

use Controller;

class HomeController extends \Libs\Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        echo "Hola Mundo!!!";
        require_once $this->ruta;
    }
}
