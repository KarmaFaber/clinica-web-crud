<?php
$conexion=mysqli_connect("localhost","root","","clinica") or die ("Error al conectar con la base de datos".mysqli_error($conexion));
mysqli_set_charset($conexion, "utf8");

$usuario=$_REQUEST['usuario'];

$contrasenia=$_REQUEST['contrasenia']; /*contraseña del formulario de login*/
$encriptada=md5($contrasenia);

$registro=mysqli_query($conexion, "select nombre, email, contasenia from usuarios where contasenia='$encriptada' and (nombre='$usuario' or email='$usuario')") or die("error al realizar la consulta".mysqli_error($conexion)); 


$cantidad=mysqli_num_rows($registro);

	if($cantidad==0)
		{ 
		header ("location:error_login.php");
		}
	else
		{
		header("location:2_clinica.php");
		}

mysqli_close($conexion);


?>