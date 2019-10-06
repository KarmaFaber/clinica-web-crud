<?php
if (!isset ($_COOKIE['sesion']))
{
	header("location:pagina_error.php");
}

$conexion=mysqli_connect("localhost", "root", "", "clinica") or die("Error al conectar a la base de datos");
mysqli_set_charset($conexion, "utf8");
$registros=mysqli_query($conexion, "select id_provincia, provincia from provincias order by provincia") or die ("Error al cargar las provincias");
$registros2=mysqli_query($conexion, "select cod_especialidad, nombre from especialidades") or die("Error al cargar las especialidades");
?>


<!doctype HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Alta Enfermero</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="icon" type="image/jpeg" href="images/icons/favicon_01.jpg" />
	<style>
	.content{padding-left:30px; padding-right:15px;}
	body{paddig-bottom:50px; padding-left:25px;}
	
	</style>
	
</head>
<body>
	
	
		
	<header class="jumbotron text-center"><h1>Alta Enfermeros</h1></header>
	<?php
	include("menu.php");
	?>
	
	<?php
		if ($_COOKIE['sesion']==3)
		{
			echo "<h1 style='color:#BE112E; text-align:center;'> no tiene nivel de acceso suficiente para acceder a este apartado</h1>";
		}
		?>
		
		<?php
		if ($_COOKIE['sesion']==1 or $_COOKIE['sesion']==2)
		{
		?>
	<div class="row">	
	<div class="content col-sm-5">
	<form method="get" action="4.1.2_insertar_enfermero.php">
	<br/>
	<input type="text" id="dni" name="dni" placeholder="Incerte DNI" maxlength="9" required class="form-control">
	<br/>
	<input type="text" id="nombre" name="nombre" placeholder="Incerte el Nombre" class="form-control">
	<br/>
	<input type="text" id="apellidos" name="apellidos" placeholder="Incerte los apellidos" class="form-control">
	<br/>
	
	<select id="especialidades" name="especialidades" class="form-control"> 
		<option disabled selected> Escoja Especialidad</option>
		<?php
			while($reg=mysqli_fetch_array($registros2))
			{
		?>
		<option value="<?php echo $reg['cod_especialidad'];?>"><?php echo $reg['nombre'];?></option> 
		<?php
			}
		?>
	</select><br/><br/>
	
	<select id="provincia" name="provincia" class="form-control">
		<option disabled selected> Escoja Provincia</option>
		<?php
			while($reg=mysqli_fetch_array($registros))
			{
		?>
		
		<option value="<?php echo $reg['id_provincia'];?>"><?php echo $reg['provincia'];?></option>
		<?php
			}
		?>
	</select>
		
	<br/><br/>
	<button type="submit">enviar</button>
	<button type="reset">cancelar</button>
		
		<?php
			
		}
		mysqli_close($conexion);
		?>
	</form>	</div></div>
</body>
</html>