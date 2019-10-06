<?php
$conexion=mysqli_connect("localhost", "root", "", "clinica") or die("error al conectar con la base de datos".mysqli_error($conexion));
mysqli_set_charset($conexion, "utf8");

$nombre=$_REQUEST['nombre'];
$email=$_REQUEST['email'];

$contrasenia=$_REQUEST['contrasenia'];
$encriptada=md5($contrasenia);

$usuario=$_REQUEST['usuario'];

mysqli_query($conexion, "update usuarios set nombre='$nombre', email='$email', contasenia='$encriptada', tipo=$usuario where nombre='$nombre'") or die("error al realizar la modificación.  ".mysqli_error($conexion));

echo "<h2 style='text-align:center; color:green; padding-top:50px;'>Se ha modificado el usuario correctamente.</h2>
	<br/><br/>
	<p style='text-align:center; padding-top:10px;'>
	<button type='button'><a href='1.2.3_listado_usuarios.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Ir a la lista.</a></button>  
	<button type='button'><a href='2_clinica.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Ir al Inicio.</a>
	</button></p>";

mysqli_close($conexion);
?>