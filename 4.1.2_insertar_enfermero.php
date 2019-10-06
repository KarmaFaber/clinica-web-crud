<?php
$conexion=mysqli_connect("localhost","root","","clinica") or die("Error al conectar a la base de datos");
$dni=$_REQUEST['dni'];
$nombre=$_REQUEST['nombre'];
$apellidos=$_REQUEST['apellidos'];
$provincia=$_REQUEST['provincia'];
$especialidades=$_REQUEST['especialidades'];

/*consulta de enfermero*/
$registro=mysqli_query($conexion, "select dni, nombre, apellidos from enfermeros where dni='$dni'") or die("Error al realizar la consulta área enfermero");
mysqli_set_charset($conexion, "utf8");

$cantidad=mysqli_num_rows($registro);
if($cantidad==0)
{
	mysqli_query($conexion,"insert into enfermeros (dni, nombre, apellidos, cod_especialidad, id_provincia) values ('$dni', '$nombre', '$apellidos', $especialidades, $provincia)") or die ("Error al generar el alta  ".mysqli_error($conexion));
	
	echo ("
	<h2 style='text-align:center; color:green; padding-top:50px;'><i class='fas fa-clipboard-check'></i> El alta se realizo correctamente.</h2><br/>
	<p style='text-align:center; padding-top:10px;'>
	
	<a href='4.1.1_nuevo_enfermero.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Ingresar otro enfermero.</a>  
	
	<a href='4.2.1_listado_enfermeros.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Listado.</a>
	
	<a href='2_clinica.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Página inicio.</a></p>");
}
else
	{
	$reg=mysqli_fetch_array($registro);	
	echo "<h2 style='text-align:center; color:red; padding-top:50px;'>El enfermero  " .$reg['nombre']."  ".$reg['apellidos']."  ya existe</h2>
	<br/><br/>
	<p style='text-align:center; padding-top:10px;'>
	
	<a href='4.2.1_listado_enfermeros.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Revisar lista</a>
	      
	<a href='4.1.1_nuevo_enfermero.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Volver a intentar</a>
	</p>";
	}
	

mysqli_close($conexion);
?>