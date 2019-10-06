<?php
	$conexion=mysqli_connect("localhost","root","","clinica") or die ("error al conectar");
	
	if (isset($_REQUEST['usuario']) and isset($_REQUEST['contrasenia']))
	{
		$usuario=mysqli_real_escape_string($conexion, $_REQUEST['usuario']); /*se carga los caracteres especiales para que los piratas infromaticos puedan haquear */
		
		$contrasenia = mysqli_real_escape_string($conexion, $_REQUEST['contrasenia']);
		$encriptada = md5($contrasenia);
		
		$registro=mysqli_query($conexion, "select nombre, email, contasenia, tipo from usuarios where contasenia='$encriptada' and (nombre='$usuario' or email='$usuario')") or die("error al realizar la consulta".mysqli_error($conexion)); 
		
		$cantidad=mysqli_num_rows($registro);
		if($cantidad==0) /*ojo aqui es ==0 !!*/
		{
			header ("location:error_login.php");
		}
		else
		{
			$reg=mysqli_fetch_array($registro);
			setcookie("sesion",$reg['tipo'],time()+10000,"/");
			setcookie("nombre",$reg['nombre'],time()+1000,"/");
			header("location:2_clinica.php");
		}
	}
	else
	{		
		header("location:error_login.php");
	}
?>