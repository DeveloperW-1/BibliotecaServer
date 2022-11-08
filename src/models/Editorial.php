<?php

class editoriales
{
    public $Id;
    public $Nombre;
    public $SitioWeb;
    public $Domicilio;
    public $Telefono;
    public $Email;

    public static function Existe(int $id)
    {
        $sql = sprintf("SELECT * FROM Editoriales WHERE id = %d", $id);
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

    public static function BuscarPorID($id)
    {
        $sql = sprintf("SELECT * FROM Editoriales WHERE Id=%d", $id);
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
            $editorial = $rst->fetch_object();
            return $editorial;
        }
    }

    public function Guardar()
    {
        if(!Validacion::LongitudCorrecta($this->Nombre, 50))
            return false;
        // Conectar a la base de datos
        $db = new MiConexion();
        // Consulta Insert
        $sql = sprintf("INSERT INTO Editoriales (Nombre) VALUES ('%s')", $this->Nombre);
        $rst = $db->query($sql);

        // Validar resultado
        if(!$rst)
            die('Error al ejecutar la consulta: '. $sql);
            $this->Id = $db->insert_id;
            return true;
    }
}