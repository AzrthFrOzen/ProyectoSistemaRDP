<?php

namespace Libs;

class Connection
{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $pdo = NULL;

    private static $_instance = null;

    public function __construct()
    {
        $this->host = myEnv('DB_HOST');
        $this->user = myEnv('DB_USERNAME');
        $this->pass = myEnv('DB_PASSWORD');
        $this->db = myEnv('DB_DATABASE');

        $this->connect();
    }

    public function __clone()
    {
        # code...
    }

    public function __wakeup()
    {
        # code...
    }

    public static function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new Connection();
        }
        return self::$_instance;
    }

    private function connect()
    {
        try {
            $options = array(
                \PDO::ATTR_PERSISTENT => false,
                \PDO::ATTR_EMULATE_PREPARES => false,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
            );

            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;

            $this->pdo = new \PDO($dsn, $this->user, $this->pass, $options);
        } catch (\PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            throw $e;
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
