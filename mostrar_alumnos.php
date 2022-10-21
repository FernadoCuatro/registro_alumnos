<?php 
try {
 require_once 'conn/conn.php';

 $sql = 'CALL `mostrar_alumnos`();';
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
 <title>MOSTRAR</title>
 <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

 <div class="contenido">
  <div class="contenedor">
   
   <div class="botton-atras">
    <a href="index.php">Volver atras</a>
   </div>

   <h1 class="texto_presentacion">Solicitudes de nuevo ingreso de estudiantes</h1>

   <div class="contenido-alumno">

    <table class="informacion-alumno">
     <thead>
      <th>Nombre completo</th>
      <th>NIE</th>
      <th>Fecha nacimiento</th>
      <th>Correo electrónico</th>
      <th>Foto</th>
      <th></th>
     </thead>

     <tbody>
      <?php while ($registro = $resultado->fetch_assoc()) { ?>
       <tr>
        <td><?php echo $registro['ApellidoAlumno']; ?>, <?php echo $registro['NombreAlumno']; ?></td>
        <td><?php echo $registro['NieAlumno']; ?></td>
        <td><?php echo $registro['FechaNacimientoAlumno']; ?></td>
        <td><?php echo $registro['EmailAlumno']; ?></td>
        <td style="width: 20%"><img src="alumnos/<?php echo $registro['FotoAlumno']; ?>" class="modelo-img" alt=""></td>
        <td><a href="ver_alumno.php?id=<?php echo $registro['AlumnoID']; ?>" class="informacion-boton">Información <br/> del alumno</a></td>
       </tr>
      <?php } ?>

     </tbody>
    </table>
   </div>

  </div>
 </div>
 
</body>
</html>