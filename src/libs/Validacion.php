<?php

class Validacion
{
    public static function EsNuloVacio($valor)
    {
        if(is_null($valor) or $valor == '')
            return true;
        else
            return false;
    }

    public static function LongitudCorrecta($cadena, $longitud)
    {
        if(Validacion::EsNuloVacio($cadena))
            return false;
        if(strlen($cadena) > $longitud)
            return false;
        return true;
    }
}