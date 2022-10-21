<?php 
if (isset($_GET['id'])) {
 $id = $_GET['id'];
}else{
 header("Location: mostrar_alumnos.php");
}

try {
 require_once 'conn/conn.php';
 $sql = "CALL `obtener_alumno`('$id');";
 $resultado = conexion($bd_config)->query($sql);
} catch (Exception $e) {
 $error->$e->getMessage();
}
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>INFORMACION</title>
 <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

 <div class="contenido">
  <div class="contenedor">
   
   <h1 class="texto_presentacion">Registro de solicitud de nuevo ingreso de estudiantes</h1>


   <?php while ($registro = $resultado->fetch_assoc()) { ?>

    <section class="recopilar-info alumno-img">
      <img src="alumnos/<?php echo $registro['FotoAlumno'] ?>" alt="<?php echo $registro['FotoAlumno'] ?>">
    </section>

    <section class="recopilar-info informacion-alumno">
     <div class="espacio-input">
      <label for="nombre_alumno">Nombres del alumno:</label>
      <p><?php echo $registro["NombreAlumno"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="apellido_alumno">Apellidos del alumno:</label>
      <p><?php echo $registro["ApellidoAlumno"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="nie_alumno">NIE del alumno:</label>
      <p><?php echo $registro["NieAlumno"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="dui_alumno">Dui del alumno: (opcional)</label>
      <p><?php echo $registro["DuiAlumno"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="nacimiento_alumno">Fecha de nacimiento del alumno: </label>
      <p><?php echo $registro["FechaNacimientoAlumno"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="lugar_alumno">Lugar de nacimiento del alumno:</label>
      <p><?php echo $registro["LugarNacimientoAlumno"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="correo_alumno">Correo electrónico del alumno:</label>
      <p><?php echo $registro["EmailAlumno"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="telefono_alumno">Teléfono del alumno:</label>
      <p><?php echo $registro["TelefonoAlumno"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="direccion_alumno">Dirección actual del alumno:</label>
      <p><?php echo $registro["DireccionAlumno"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="departamento_alumno">Departamento:</label>
      <p><?php echo $registro["DepartamentoAlumno"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="municipio_alumno">Municipio:</label>
      <p><?php echo $registro["MunicipioAlumno"] ?></p>
     </div>
    </section>

    <section class="recopilar-info informacion-encargado">
     <div class="espacio-input">
      <label for="nombre_encargado">Nombres del encargado:</label>
      <p><?php echo $registro["NombreEncargado"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="apellidos_encargado">Apellidos del encargado:</label>
      <p><?php echo $registro["ApellidoEncargado"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="lugar_encargado">Lugar de nacimiento del encargado:</label>
      <p><?php echo $registro["LugarNacimientoEncargado"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="direccion_encargado">Dirección del encargado:</label>
      <p><?php echo $registro["DireccionActualEncargado"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="tel_casa_encargado">Teléfono de casa del encargado:</label>
      <p><?php echo $registro["TelefonoCasa"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="trabajo_encargado">Lugar del trabajo encargado:</label>
      <p><?php echo $registro["LugarTrabajo"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="telefono_encargado">Teléfono personal del encargado:</label>
      <p><?php echo $registro["TelefonoPersonal"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="dui_encargado">Dui del encargado: </label>
       <p><?php echo $registro["DuiEncargado"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="parentesco_encargado">Parentesco del encargado con el alumno:</label>
      <p><?php echo $registro["ParentescoEncargado"] ?></p>
     </div>
    </section>

    <section class="recopilar-info informacion-preferencia">
     <div class="espacio-input">
      <label for="grado_preferencia">Grado:</label>
      <p><?php echo $registro["Grado"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="seccion_preferencia">Sección:</label>
      <p><?php echo $registro["seccion"] ?></p>
     </div>

     <div class="espacio-input">
      <label for="especialidad_preferencia">Especialidad:</label>
      <p><?php echo $registro["Especialidad"] ?></p>
     </div>
    </section>

    <?php } ?>

    <section class="recopilar-info envio-datos">

     <div class="botton-imprimir">
      <a href="imprimir_alumno.php?id=<?php echo $id?>" target="_blank" >Generar .PDF del alumno</a>
     </div>

     <div class="botton-atras">
      <a href="mostrar_alumnos.php">Volver atras</a>
     </div>
    </section>

  </div>
 </div>
 
</body>
</html>
