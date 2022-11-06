<?php

class MiConexion extends mysqli
{
    private $host = '127.0.0.1';
    private $user = 'root';
    private $password = '';
    private $dbname = 'biblioteca';
    private $port = 3306;

    public function __construct()
    {
        parent::__construct($this->host, $this->user, $this->password, $this->dbname,$this->port);
        // if(!$this->conn)
        // {
        //     die('Error al conectar a la Base de Datos');
        // }

        // return $this->conn;
    }
}
