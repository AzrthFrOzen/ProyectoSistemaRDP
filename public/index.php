<?php
//EL ORDEN IMPORTA

use Libs\ContainerDI;

require_once "../vendor/autoload.php";

// CARGAMOS EL ARCHIVO DE CONFIGURACIÓN .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


require_once "../config/config.php";
/*
Se puede colocar new Core() con un use Libs\Core;
o Se puede colocar directamente new Libs\Core();
*/

//require_once '../libs/core.php';
//require_once '../libs/controller.php';
//require_once '../config/config.php';
//require_once '../app/helpers/helpers.php';

$url = new Libs\Core(new ContainerDI);
