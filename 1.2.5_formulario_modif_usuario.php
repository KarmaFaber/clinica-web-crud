<?php
 if (!isset ($_COOKIE['sesion']))
 {
	 header("location:pagina_error.php");
 }
 
$conexion=mysqli_connect("localhost", "root", "", "clinica") or die("Error al conectar a la base de datos.");
mysqli_set_charset($conexion, "utf8");

$nombre=$_REQUEST['nombre'];


$registro=mysqli_query($conexion, "select usuarios.nombre, usuarios.email, usuarios.tipo, usuarios.contasenia from usuarios where nombre='$nombre'") or die("Erro al consultar datos".mysqli_error($conexion)); 

$reg=mysqli_fetch_array($registro); 


?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulario modificar Usuario</title>
<link rel="stylesheet" href="css/estilo.css">
<link rel="icon" type="image/jpeg" href="images/icons/favicon_01.jpg" /> 
<style>
form{padding-left:200px; padding-right:200px;}
</style>
</head>


<body>
<header class="jumbotron text-center"><h1>Modificar Usuario</h1></header>
 <?php
 include("menu.php");
 ?>
 

 
	<form action="1.2.6_modificar_usuario.php" method="get"> <!---ojo con el mothod get a la hora de mandar la contraseña-->	
	<div class="row">
	<div class="col sm-6 offset-sm-2">	
	Nombre de usuario<input type="text" name="nombre" id="nombre" readonly class="form-control" value="<?php echo $reg['nombre'];?>">
	Email <input type="email" name="email" id="email" required class="form-control" value="<?php echo $reg['email'];?>">
	Contraseña <input type="password" name="contrasenia" required id="contrasenia" class="form-control" >
	Tipo de usuario  
	<select id="usuario" name="usuario" class="form-control">
		<option disabled selected>Escoja una opción.</option>
		<option value="001">Administrador</option>
		<option value="002">Usuario</option>
		<option value="003">Invitado</option>
	</select>
	
	<br/><br/>
	
	<button type="submit">Enviar</button>
	</form>

 
	</div>
	</div>
 