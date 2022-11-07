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

    public function BuscarPorNombresApellidos(string $nombresApellidos)
    {
        if(empty($nombresApellidos)){
            return null;
        }
        // se quitan los espacios al inicio y al fin de la cadena (trim), y se separo por cada espacio que haya en la cadena (explode)
        $enPartes = explode(' ', trim($nombresApellidos));
        $sql = "SELECT * FROM autores WHERE ";
        if(count($enPartes) == 1){ //En caso de que la cadena tenga un elemento se realiza la consulta sql
            $sql .= "CONCAT(Nombres, ' ', Apellidos) like '%".$enPartes[0]."%'";
        }else if(count($enPartes) > 1){ // En caso de que la cadena tenga mas de un elemento se realiza la consulta SQL
           for ($i = 0; $i < count($enPartes); $i++) {
                if($i == 0){
                    $sql .= "CONCAT(Nombres, ' ', Apellidos) like '%".$enPartes[0]."%'";
                }else{
                    $sql .= "OR CONCAT(Nombres, ' ', Apellidos) like '%".$enPartes[$i]."%'";
                }
            }
        }
        return $sql;
    }
}
