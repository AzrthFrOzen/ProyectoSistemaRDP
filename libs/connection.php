<?php

class Connection
{
    private $pdo;

    private string $host = 'localhost';
    private string $user = 'root';
    private string $pass = '';
    private string $dbname = 'SistemaGestion';

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        # Conexion a base de datos
        $options = [
            PDO::ATTR_PERSISTENT => false,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
        ];

        try {
            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass, $options);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
    public function closeConnection()
    {
        $this->pdo = null;
    }
}
