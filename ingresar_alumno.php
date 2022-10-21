<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>REGISTRO</title>
 <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

 <div class="contenido">
  <div class="contenedor">
   
   <div class="botton-atras">
    <a href="index.php">Volver atras</a>
   </div>

   <h1 class="texto_presentacion">Registro de solicitud de nuevo ingreso de estudiantes</h1>

   <form action="procesar_alumno.php" method="post" enctype="multipart/form-data">
    
    <section class="recopilar-info informacion-alumno">
	    <div class="espacio-input">
	     <label for="nombre_alumno">Nombres del alumno:</label>
	     <input type="text" name="nombre_alumno" id="nombre_alumno" maxlength="50" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="apellido_alumno">Apellidos del alumno:</label>
	     <input type="text" name="apellido_alumno" id="apellido_alumno" maxlength="50" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="nie_alumno">NIE del alumno:</label>
	     <input type="number" name="nie_alumno" id="nie_alumno" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="dui_alumno">Dui del alumno: (opcional)</label>
	     <input type="text" name="dui_alumno" id="dui_alumno" value="0">
	    </div>

	    <div class="espacio-input">
	     <label for="nacimiento_alumno">Fecha de nacimiento del alumno: </label>
	     <input type="date" name="nacimiento_alumno" id="nacimiento_alumno" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="lugar_alumno">Lugar de nacimiento del alumno:</label>
	     <input type="text" name="lugar_alumno" id="lugar_alumno" maxlength="75" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="correo_alumno">Correo electrónico del alumno:</label>
	     <input type="email" name="correo_alumno" id="correo_alumno" maxlength="75" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="telefono_alumno">Teléfono del alumno:</label>
	     <input type="number" name="telefono_alumno" id="telefono_alumno" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="direccion_alumno">Dirección actual del alumno:</label>
	     <input type="text" name="direccion_alumno" id="direccion_alumno" maxlength="120" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="departamento_alumno">Departamento:</label>
							<select name="departamento_alumno" id="departamento_alumno" required="on">
									<option value="Ahuachapan">Ahuachapán</option>
									<option value="Santa Ana">Santa Ana</option>
									<option value="Sonsonate">Sonsonate</option>
							  <option value="San Salvador" selected>San Salvador</option>
							  <option value="La Libertad">La Libertad</option>
							  <option value="Chalatenango">Chalatenango</option>
							  <option value="Cuscatlan">Cuscatlán</option>
							  <option value="La Paz">La Paz</option>
							  <option value="Cabanias">Cabañas</option>
							  <option value="San Vicente">San Vicente</option>
							  <option value="Usulutan">Usulután</option>
							  <option value="San Miguel">San Miguel</option>
							  <option value="Morazan">Morazán</option>
							  <option value="La Union">La Unión</option>
							</select>
	    </div>

	    <div class="espacio-input">
	     <label for="municipio_alumno">Municipio:</label>
	     <input type="text" name="municipio_alumno" id="municipio_alumno" maxlength="75" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="foto_alumno">Foto del alumno:</label>
	     <input type="file" name="foto_alumno" id="foto_alumno" required="on">
	    </div>
    </section>

    <section class="recopilar-info informacion-encargado">
	    <div class="espacio-input">
	     <label for="nombre_encargado">Nombres del encargado:</label>
	     <input type="text" name="nombre_encargado" id="nombre_encargado" maxlength="50" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="apellidos_encargado">Apellidos del encargado:</label>
	     <input type="text" name="apellidos_encargado" id="apellidos_encargado" maxlength="50" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="lugar_encargado">Lugar de nacimiento del encargado:</label>
	     <input type="text" name="lugar_encargado" id="lugar_encargado" maxlength="75" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="direccion_encargado">Dirección del encargado:</label>
	     <input type="text" name="direccion_encargado" id="direccion_encargado" maxlength="75" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="tel_casa_encargado">Teléfono de casa del encargado:</label>
	     <input type="number" name="tel_casa_encargado" id="tel_casa_encargado" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="trabajo_encargado">Lugar del trabajo encargado:</label>
	     <input type="text" name="trabajo_encargado" id="trabajo_encargado" maxlength="50" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="telefono_encargado">Teléfono personal del encargado:</label>
	     <input type="number" name="telefono_encargado" id="telefono_encargado" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="dui_encargado">Dui del encargado: </label>
	     <input type="number" name="dui_encargado" id="dui_encargado" required="on">
	    </div>

	    <div class="espacio-input">
	     <label for="parentesco_encargado">Parentesco del encargado con el alumno:</label>
	     <input type="text" name="parentesco_encargado" id="parentesco_encargado" maxlength="25" required="on">
	    </div>
    </section>

    <section class="recopilar-info informacion-preferencia">
	    <div class="espacio-input">
	     <label for="grado_preferencia">Grado:</label>
							<select name="grado_preferencia" id="grado_preferencia" required="on">
							  <option value="1" selected>1</option>
							  <option value="2" disabled="on">2</option>
							  <option value="3" disabled="on">3</option>
							</select>
	    </div>

	    <div class="espacio-input radio-stilos">
	     <label for="seccion_preferencia">Sección:</label> <br/>
							<input type="radio" name="seccion_preferencia" value="A" checked>A 
							<input type="radio" name="seccion_preferencia" value="B">B
							<input type="radio" name="seccion_preferencia" value="C">C
	    </div>

	    <div class="espacio-input"></div>  

	    <div class="espacio-input">
	     <label for="especialidad_preferencia">Especialidad:</label>
							<select name="especialidad_preferencia" id="especialidad_preferencia" required="on">
									<option value="Atencion primaria en salud">Atención primaria en salud</option>
							  <option value="General">General</option>
							  <option value="Desarrollo de Software" selected>Desarrollo de Software</option>
							  <option value="Electronica">Electrónica</option>
							  <option value="Sistemas Electricos">Sistemas Eléctricos</option>
							  <option value="Administrativo Contable">Administrativo Contable</option>
							</select>
	    </div>
    </section>

    <section class="recopilar-info envio-datos">
    	<input type="submit" value="Enviar datos">
    </section>

   </form>

  </div>
 </div>
 
</body>
</html>

