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

<?php ob_start() ?>
 <div class="contenido">
  <div class="contenedor">
   
   <h1 class="texto_presentacion">Registro de solicitud de nuevo ingreso de estudiantes</h1>

    <?php while ($registro = $resultado->fetch_assoc()) { ?>
    <section class="recopilar-info informacion-alumno">

     <table style="margin: 0px auto;">
      <tr>
        <td colspan="3" style="text-align: center;"><img src="alumnos/<?php echo $registro['FotoAlumno'] ?>" alt="<?php echo $registro['FotoAlumno'] ?>" style="width: 30%"></td>
      </tr>

       <tr style="height: 50px">
         <td style="padding-right: 20px;">Nombres del alumno: <?php echo $registro["NombreAlumno"] ?></td>
         <td style="padding-right: 20px;">Apellidos del alumno: <?php echo $registro["ApellidoAlumno"] ?></td>
         <td style="padding-right: 20px;">NIE del alumno: <?php echo $registro["NieAlumno"] ?></td>
       </tr>

       <tr style="height: 50px">
         <td style="padding-right: 20px;">Dui: (opcional): <?php echo $registro["DuiAlumno"] ?></td>
         <td style="padding-right: 20px;">Correo electrónico: <?php echo $registro["EmailAlumno"] ?></td>
         <td style="padding-right: 20px;">Teléfono: <?php echo $registro["TelefonoAlumno"] ?></td>
       </tr>

       <tr style="height: 50px">
         <td style="padding-right: 20px;">Fecha de nacimiento: <?php echo $registro["FechaNacimientoAlumno"] ?></td>
         <td style="padding-right: 20px;">Lugar de nacimiento: <?php echo $registro["LugarNacimientoAlumno"] ?></td>
       </tr>

       <tr style="height: 50px">
         <td style="padding-right: 20px;">Dirección actual: <?php echo $registro["DireccionAlumno"] ?></td>
       </tr>

       <tr style="height: 50px">
         <td style="padding-right: 20px;">Departamento: <?php echo $registro["DepartamentoAlumno"] ?></td>
         <td style="padding-right: 20px;">Municipio: <?php echo $registro["MunicipioAlumno"] ?></td>
       </tr>
     </table>

   </section>

   <hr>

    <section class="recopilar-info informacion-encargado">
      <h5>Encargado</h5>
      <table style="margin: 0px auto;">
       <tr style="height: 50px">
         <td style="padding-right: 20px;">Nombres del encargado: <?php echo $registro["NombreEncargado"] ?></td>
         <td style="padding-right: 20px;">Apellidos del encargado: <?php echo $registro["ApellidoEncargado"] ?></td>
         <td style="padding-right: 20px;">Dui del encargado: <?php echo $registro["DuiEncargado"] ?></td>
       </tr>

       <tr style="height: 50px">
         <td  style="padding-right: 20px;">Lugar de nacimiento del encargado: <?php echo $registro["LugarNacimientoEncargado"] ?></td>
       </tr>

       <tr style="height: 50px">
         <td style="padding-right: 20px;">Dirección actual del encargado: <?php echo $registro["DireccionActualEncargado"] ?></td>
       </tr>

       <tr style="height: 50px">
         <td style="padding-right: 20px;">Teléfono de casa del encargado: <?php echo $registro["TelefonoCasa"] ?></td>
         <td style="padding-right: 20px;">Teléfono personal del encargado: <?php echo $registro["TelefonoPersonal"] ?></td>
       </tr>

       <tr style="height: 50px">
         <td style="padding-right: 20px;">Lugar del trabajo encargado: <?php echo $registro["LugarTrabajo"] ?></td>
         <td style="padding-right: 20px;">Parentesco: <?php echo $registro["ParentescoEncargado"] ?></td>
       </tr>

      </table>
    </section>

    <hr>

    <section class="recopilar-info informacion-preferencia">
      <h5>Preferencia de especialidad de ingreso</h5>

      <table style="margin: 0px auto;">
       <tr style="height: 50px">
         <td style="padding-right: 20px;">Especialidad: <br/><?php echo $registro["Especialidad"] ?></td>
         <td style="padding-right: 20px;">Grado: <br/><?php echo $registro["Grado"] ?></td>
         <td style="padding-right: 20px;">Sección: <br/><?php echo $registro["seccion"] ?></td>
       </tr>
      </table>
    </section>

    <?php $nombre_identificador = $registro["NombreAlumno"] . "-" . $registro["ApellidoAlumno"] ?>

    <?php } ?>

  </div>
 </div>
 
</body>
</html>

<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = $nombre_identificador . "-Ingreso.pdf";
file_put_contents($filename, $pdf);
$dompdf->stream($filename);
?>
