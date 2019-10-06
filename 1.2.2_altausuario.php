<?php
$nombre=$_REQUEST['nombre'];
$email=$_REQUEST['email'];
$usuario=$_REQUEST['usuario'];

$contrasenia=$_REQUEST['contrasenia'];
$encriptada=md5($contrasenia);
$conexion=mysqli_connect("localhost","root","","clinica") or die("Error al conectar a la base de datos");
mysqli_set_charset($conexion, "utf8");

$registro=mysqli_query($conexion, "select nombre, email from usuarios where nombre='$nombre' or email='$email'") or die("error al realizar la consulta");


$cantidad=mysqli_num_rows($registro);

	if($cantidad==0)
	{
		mysqli_query($conexion, "insert into usuarios(nombre, email, contasenia, tipo) values('$nombre', '$email', '$encriptada', $usuario)") or die("Error al generar el alta".mysqli_error($conexion));
		echo ("<br/>
	<p style='text-align:center; padding-top:10px;'>
	<a href='2_clinica.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Inicio</a>
	<a href='1.2.1_alta_usuario.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Ingresar otro usuario.</a>   
	<a href='1.2.3_listado_usuarios.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Listado usuarios.</a>
	</p>");
	}
	else
	{
		$reg=mysqli_fetch_array($registro);
		echo "El usuario ".$reg['nombre']." ya existe";
	}

	
mysqli_close($conexion);

?>