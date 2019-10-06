<?php
$nombre=$_REQUEST['nombre'];
$conexion=mysqli_connect("localhost", "root", "", "clinica") or die("error al entrar es la base de datos");
$registro=mysqli_query($conexion, "delete from usuarios where nombre='$nombre'") or die("error al realizar la consulta");

echo "<h2 style='text-align:center; color:green; padding-top:50px;'>Se ha eleiminado el usuario correctamente.</h2>
	<br/><br/>
	<p style='text-align:center; padding-top:10px;'>
	<button type='button'><a href='1.2.3_listado_usuarios.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Ir a la lista.</a></button>  
	<button type='button'><a href='2_clinica.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Ir al Inicio.</a>
	</button></p>";

mysqli_close($conexion);	
?>