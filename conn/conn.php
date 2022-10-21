<?php
$bd_config = [
'basedatos' => 'nuevo_ingreso_db', // La base de datos
'usuario' => 'root',        // Usuario
'pass' => ''                // Contraseña
];

function conexion($bd_config){
 try {
  $conn = new mysqli('localhost', $bd_config['usuario'], $bd_config['pass'], $bd_config['basedatos']);
  return $conn;
 } catch (PDOException $e) {
  return false;
 }
}
?>