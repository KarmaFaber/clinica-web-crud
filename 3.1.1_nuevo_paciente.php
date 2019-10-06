<?php
if (!isset($_COOKIE['sesion']))
{
	header("Location:pagina_error.php");
}
$conexion=mysqli_connect("localhost", "root", "", "clinica") or die ("error al conectar a la base de datos");
mysqli_set_charset($conexion, "utf8");
$registros=mysqli_query($conexion, "select id_provincia, provincia from provincias order by provincia") or die ("error al cargar las provincias".mysqli_error($conexion));
?>


<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nuevo paciente</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="icon" type="image/jpeg" href="images/icons/favicon_01.jpg" />
	<style></style>
</head>

<body>
<div class="head jumbotron text-center"><h1>Nuevo Paciente</h1></div>
	<?php
	include("menu.php");
	?>
	
	<?php
	if ($_COOKIE['sesion']==3)
	{
		echo "<h1 style='color:#BE112E; text-align:center;'> No tiene nivel de acceso suficiente para acceder a este apartado.</h1>";
	}
	?>

	<?php
	if($_COOKIE['sesion']==1 or $_COOKIE['sesion']==2)
	{
	?>
	
<div class="row">	
<div class="content col-sm-5">
<form method="get" action="3.1.2_insertar_paciente.php">
	<br/>
	Dni <input type="text" id="dni" name="dni" placeholder="Ingrese dni" required maxlength="9" class="form-control"><br/>
	
	Nombre <input type="text" id="nombre" name="nombre" placeholder="Ingrese nombre" required class="form-control"><br/>
	
	Apellidos <input type="text" id="apellidos" name="apellidos" placeholder="Ingrese apellidos" required class="form-control"><br/>
	
	Edad <input type="number" id="edad" name="edad" placeholder="Ingresar edad" class="form-control"><br/>
	
	Provincia
	<select id="provincia" name="provincia" required>
		<option disabled selected>Escoja provincia</option>
		<?php
			while($reg=mysqli_fetch_array($registros))
			{
		?>
		<option value="<?php echo $reg['id_provincia'];?>"> <?php echo $reg['provincia'];?></option>
		<?php
			}
		?>
	</select>
	
	
	<br/><br/>
	
	<button class="btn btn-primary" type="submit">Enviar</button>
	<button type="reset" class="btn btn-secondary">Cancelar</button>
	
			
		<?php
		}
		mysqli_close($conexion);
		?>
</form>
</div></div>
</body>
</html>
