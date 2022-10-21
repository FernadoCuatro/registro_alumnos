<?php
try
{
 require_once('conn/conn.php');

 if (is_uploaded_file($_FILES["foto_alumno"]["tmp_name"])){
  if ($_FILES["foto_alumno"]["type"]=="image/jpeg"|| $_FILES["foto_alumno"]["type"]=="image/jpg" || $_FILES["foto_alumno"]["type"]=="image/png"){
   
    $ruta = "alumnos/"; 
    $nombrefinal= trim ($_FILES['foto_alumno']['name']); 
    $nombrefinal= str_replace(" ", "", $nombrefinal);
    $upload= $ruta . $nombrefinal;  

    if(move_uploaded_file($_FILES['foto_alumno']['tmp_name'], $upload)) { 
     // Informacion del alumno
     $nombre_alumno = $_POST["nombre_alumno"];
     $apellido_alumno = $_POST["apellido_alumno"]; 
     $nie_alumno = $_POST["nie_alumno"]; 
     $dui_alumno = $_POST["dui_alumno"];
     $nacimiento_alumno = $_POST["nacimiento_alumno"]; 
     $lugar_alumno = $_POST["lugar_alumno"]; 
     $correo_alumno = $_POST["correo_alumno"]; 
     $telefono_alumno = $_POST["telefono_alumno"];
     $direccion_alumno = $_POST["direccion_alumno"]; 
     $departamento_alumno = $_POST["departamento_alumno"]; 
     $municipio_alumno = $_POST["municipio_alumno"];
     
     $sql = "CALL `insertar_alumnos`(
     '$nombre_alumno',
     '$apellido_alumno', 
     '$nie_alumno', 
     '$dui_alumno', 
     '$nacimiento_alumno', 
     '$lugar_alumno', 
     '$correo_alumno', 
     '$direccion_alumno', 
     '$departamento_alumno', 
     '$municipio_alumno', 
     '$nombrefinal', 
     '$telefono_alumno'
     );";
     $resultado = conexion($bd_config)->query($sql);
    }  

   $sqlObtenerID = "CALL `obtener_id`();";
   $resultObtenerID = conexion($bd_config)->query($sqlObtenerID);

   while ($ObtenerID = $resultObtenerID->fetch_assoc()) {
    $AlumnoID = $ObtenerID['AlumnoID'];
   }

   // Informacion del encargado
   $nombre_encargado = $_POST["nombre_encargado"];
   $apellidos_encargado = $_POST["apellidos_encargado"];    
   $lugar_encargado = $_POST["lugar_encargado"];   
   $direccion_encargado = $_POST["direccion_encargado"];   
   $tel_casa_encargado = $_POST["tel_casa_encargado"];
   $trabajo_encargado = $_POST["trabajo_encargado"];   
   $telefono_encargado = $_POST["telefono_encargado"];   
   $dui_encargado = $_POST["dui_encargado"];
   $parentesco_encargado = $_POST["parentesco_encargado"];

   $sql_encargado = "CALL `insertar_encargado`(
     '$AlumnoID',
     '$nombre_encargado', 
     '$apellidos_encargado', 
     '$lugar_encargado', 
     '$direccion_encargado', 
     '$tel_casa_encargado', 
     '$trabajo_encargado', 
     '$telefono_encargado', 
     '$dui_encargado', 
     '$parentesco_encargado'
     ); ";

    $resultado_encargado = conexion($bd_config)->query($sql_encargado);

   // Informacion del las preferencias
   $grado_preferencia = $_POST["grado_preferencia"];
   $seccion_preferencia = $_POST["seccion_preferencia"];   
   $especialidad_preferencia = $_POST["especialidad_preferencia"];   

   $sql_preferencias = "CALL `insertar_preferencia`(
     '$AlumnoID',
     '$grado_preferencia', 
     '$seccion_preferencia', 
     '$especialidad_preferencia'
     );";
   $resultado_preferencias = conexion($bd_config)->query($sql_preferencias);

   if($resultado) {
    header('Location: mostrar_alumnos.php');
   }else{
    header('Location: index.php');
   }

  }
  
 }else{
  header('Location: index.php');
 }

} catch (Exception $e) { $error = $e->getMessage(); }

conexion($bd_config)->close();
?>
