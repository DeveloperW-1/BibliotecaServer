<?php

class autor
{
    public $Id =null;
    public $Nombres = '';
    public $Apellidos = '';

    public static function Existe(int $id)
    {
        $sql = sprintf("SELECT * FROM Autores WHERE id = %d", $id);
        $db = new MiConexion();
        $rst = $db->query($sql);
        if(!$rst)
        {
            die("Error al ejecutar la consulta");
        }
        if($rst->num_rows == 1)
        {
            return true;
        }
        return false;
    }

    // Obtner autores
    public static function BuscarPorID($id)
    {
        $sql = sprintf("SELECT * FROM autores WHERE Id=%d", $id);
        $db = new MiConexion();
        $rst = $db->query($sql);
        if(!$rst)
        {
            die("Error al ejecutar la consulta");
        }
        if($rst->num_rows == 0)
        {
            return false;
        }else
        {
            $autor = $rst->fetch_object();
            return $autor;
        }
    }
    // Funcion Guardar

    public function Guardar()
    {
        if(!Validacion::LongitudCorrecta($this->Nombres, 50) or !Validacion::LongitudCorrecta($this->Apellidos, 50))
            return false;
        // Conectar a la base de datos
        $db = new MiConexion();
        // Consulta Insert
        $sql = sprintf("INSERT INTO Autores (Nombres, Apellidos) VALUES ('%s', '%s')", $this->Nombres, $this->Apellidos);
        $rst = $db->query($sql);

        // Validar resultado
        if(!$rst)
            die('Error al ejecutar la consulta: '. $sql);
        $this->Id = $db->insert_id;
        return true;
    }
}
