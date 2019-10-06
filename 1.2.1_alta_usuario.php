<?php
 if (!isset ($_COOKIE['sesion']))
 {
	 header("location:pagina_error.php");
 }
 

$conexion=mysqli_connect("localhost", "root", "", "clinica") or die("Error al conectar a la base de datos");
mysqli_set_charset($conexion, "utf8");
?>

<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Alta de usuarios</title>
<link rel="stylesheet" href="css/estilo.css">
<link rel="icon" type="image/jpeg" href="images/icons/favicon_01.jpg" />
<style>
form{padding-left:200px; padding-right:200px;}
</style>
</head>


<body>
<header class="jumbotron text-center"><h1>Alta de Usuarios</h1></header>
 <?php
 include("menu.php");
 ?>
 
		<?php
		if ($_COOKIE['sesion']==3)
		{
			echo "<h1 style='color:#BE112E; text-align:center;'> no tiene nivel de acceso suficiente para acceder a este apartado</h1><br/><a href='0_index.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Entrar como administrador</a>";
		}
		?>
		
		<?php
		if ($_COOKIE['sesion']==1 or $_COOKIE['sesion']==2)
		{
		?>

 
	<form action="1.2.2_altausuario.php" method="get"> <!---ojo con el mothod get a la hora de mandar la contraseña-->
	<div class="row">
	<div class="col sm-6 offset-sm-2">
	Nombre de usuario: <input type="text" name="nombre" id="nombre" required class="form-control" placeholder="usuario">
	Email: <input type="email" name="email" id="email" required class="form-control" placeholder="e-mail">
	Contraseña: <input type="password" name="contrasenia" id="contrasenia" required class="form-control" placeholder="contraseña">
	Tipo de usuario:   
	<select id="usuario" name="usuario" class="form-control">
		<option disabled selected>Escoja una opción.</option>
		<option value="001">Administrador</option>
		<option value="002">Usuario</option>
		<option value="003">Invitado</option>
	</select>
	
	<br/><br/>
	
	<button type="submit">Enviar</button>
	</form>
<?php	
		}
mysqli_close($conexion);
?>	
	
 
	</div>
	</div>

</body>

</html>