<?php
// Requrimiento del archivo autor
require '../src/models/Autor.php';
require '../src/models/Editorial.php';
require '../src/models/Libro.php';
require '../src/models/Usuario.php';
require '../src/libs/MiConexion.php';
require '../src/libs/Validacion.php';

// Probar la Conexion a la Base de Datos
// $db = new Connection();

// echo 'Conexion satisfactoria';
// var_dump() : muestra la estructura de una variable dada como parametro
// var_dump($db);

// Conectar a la Base de Datos y obtener los autores

// $query = "SELECT * FROM Autores";
// $rst = $db->query($query);

// if(!$rst)
// {
//     die("Error al ejecutar la consulta");
// }
// if($rst->num_rows == 0)
// {
//     echo 'La tabla no tiene resultados';
// }else
// {
//     while($autores = $rst->fetch_object())
//     {
//     // Castin : permite tratar el valor de una variable a otro
//         echo '<br>';
//         echo 'Autor: '.$autores->Nombres . ' ' .$autores->Apellidos;
//     }
// }

// Instanciacion de Clase "autor"
// $autor = new autor();
// $autor->Id = 100;
// $autor->Nombres='Wilver';
// $autor->Apellidos='meraz';

// Instanciacion de la Clase editorial
// $editorial = new editoriales();
// $editorial->Id = 1;
// $editorial->Nombre = 'Apex';

// Instanciacion de la clase libro
// $libro = new libro();
// $libro->Id = 1;
// $libro->Nombre = 'Programando en PHP';
// $libro->IdEditorial = 1;
// $libro->TipodePasta = 'DURA';
// $libro->Edicion = 2022;

// Instanciacion de la Clase usuario
// $usuario = new usuario();
// $usuario->Id = 1;
// $usuario->Contrasenia = 'WilverContra';
// $usuario->Alias = 'WilverCetis';
// $usuario->Nombre = 'Wilver';
// $usuario->Apellidos = 'Meraz';
// $usuario->RFC = 'adawd313122ad';
// $usuario->Correo = 'wilver@cetis.edu.mx';

// Probar la existencia de un autor
// Existe, es un metodo estatico, por lo cual no requiere ser instanciado
// if(Autor::Existe(2))
// {
//     echo "El usuario Existe";
// }else{
//     echo "El usuario no existe";
// }

// probar BuscaPorID()

// $autor3 = new autor();
// $autor4 = $autor3->BuscarPorID(4);
// if(!$autor4)
// {
//     echo "El autor no existe";
// }else
// {
//     echo "Autor encontrado " . $autor4->Nombres;
// }
// $autorE = autor::BuscarPorID(2);
// if(autor::BuscarPorID(2))
// {
//     echo "Usuario existente ".$autorE->Nombres . " " . $auotrE->Apellidos;
// }else{
//     echo "Usuario no existente";
// }

// Instancioacion de autor()
// $Autor = new autor();
// // Asignacion de Valores Locales
// $Autor->Nombres = 'Prueba';
// $Autor->Apellidos = '';
// // validacion para saber el registro
// if($Autor->Guardar())
//     echo 'Registrado Nombre : ' . $Autor->Nombres;
// else
//     echo 'Error: Hubo un error en los datos proporcionados'; 