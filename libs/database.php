<?php

namespace Libs;

use \Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public function __construct() 
    {
        $capsule = new Capsule();

        $capsule -> addConnection([
            'driver' => myEnv('DB_CONNECTION', 'mysql'),
            'host' => myEnv('DB_HOST'),
            'database' => myEnv('DB_DATABASE'),
            'username' => myEnv('DB_USERNAME'),
            'password' => myEnv('DB_PASSWORD'),
            'charset' => myEnv('DB_CHARSET'),
            'collation' => myEnv('DB_COLLATION'),
            'prefix' => ''
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}