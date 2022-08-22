<?php

namespace App\Controllers;
use Libs\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadBlade();
    }
    
    public function index()
    {
        echo $this->blade->make('home.index', ['name' => 'Abraham'])->render();
    }
}
