<?php

namespace App\Controllers;

use Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        require_once $this->ruta;
    }
}
