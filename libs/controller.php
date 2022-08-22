<?php

namespace Libs;

use Jenssegers\Blade\Blade;

class Controller
{
    protected string $ruta;
    protected $blade;
    public function __construct()
    {
        $this->ruta = __DIR__ . '/../app/views/templates/layout.php';
    }

    public function loadBlade()
    {
        $pathViews = __DIR__ . '/../app/views';
        $pathCache = __DIR__ . '/../cache';

        $this->blade = new Blade($pathViews, $pathCache);
    }
}
