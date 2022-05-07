<?php

/*
Se puede colocar new Core() con un use Libs\Core;
o Se puede colocar directamente new Libs\Core();
*/

require_once '../libs/core.php';
require_once '../libs/controller.php';
require_once '../config/config.php';
require_once '../app/helpers/helpers.php';

$url = new Libs\Core();
