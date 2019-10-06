<?php
if (!isset ($_COOKIE['sesion']))
 {
	 header("location:pagina_error.php");
 }
 
 
$conexion=mysqli_connect("localhost","root","","clinica") or die("Error al conectar a la base de datos");

$dni=$_REQUEST['dni'];

mysqli_set_charset($conexion, "utf8");

$registro=mysqli_query($conexion, "select enfermeros.dni, enfermeros.nombre, enfermeros.apellidos, enfermeros.cod_especialidad, enfermeros.id_provincia,  provincias.provincia, especialidades.nombre as nespecialidad from especialidades inner join enfermeros on especialidades.cod_especialidad =enfermeros.cod_especialidad inner join provincias on enfermeros.id_provincia=provincias.id_provincia where dni='$dni'") or die("Error al consultar datos".mysqli_error($conexion));

$reg=mysqli_fetch_array($registro); 



$todaslasespecialidades=mysqli_query($conexion, "select cod_especialidad, nombre from especialidades as nespecialidad") or die("Error al consultar las especialidades.".mysqli_error($conexion));


$todaslasprovincias=mysqli_query($conexion, "select id_provincia, provincia from provincias") or die("Error al consultar las provincias: ".mysqli_error($conexion)); /*consulta especifica para las provincias, vinculada a la tabla de datos de paciente*/
?>



<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Modificar Enfermero</title>
		<link rel="stylesheet" href="css/estilo.css">
	<link rel="icon" type="image/jpeg" href="images/icons/favicon_01.jpg" />
	</head>
	
	
	<?php
		if ($_COOKIE['sesion']==3)
		{
			echo "<h1 style='color:#BE112E; text-align:center;'> no tiene nivel de acceso suficiente para acceder a este apartado</h1><br/><a href='0_index.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Entrar como empleado</a>";
		}
		?>
		
		<?php
		if ($_COOKIE['sesion']==1 or $_COOKIE['sesion']==2)
		{
		?>
	
	<body>
	<div class="head jumbotron text-center"><h1>Modificar Enfermero</h1></div>
	<?php
	include("menu.php");
	?>
	
	<div class="row"><div class="col-sm-5">
	<form action="4.2.4_modificarenfermero.php" method="get">
	
	DNI <input type="text" id="dni" name="dni" value="<?php echo $reg['dni'];?>" readonly class="form-control">
	Nombre <input type="text" id="nombre" name="nombre" value="<?php echo $reg['nombre'];?>" class="form-control">
	Apellidos <input type="text" id="apellidos" name="apellidos" value="<?php echo $reg['apellidos'];?>" class="form-control"><br/>
	
		<select id="especialidad" name="especialidad" required class="form-control">
		
				<option <?php echo $reg['cod_especialidad'];?> selected><?php echo $reg['nespecialidad'];?></option> 
				
					<?php
					while ($reg1=mysqli_fetch_array($todaslasespecialidades))
					{
					?>
				<option value="<?php echo $reg1['cod_especialidad'];?>"><?php echo $reg1['nombre'];?></option>	
					<?php
					}
					?>
		</select><br/><br/>
	
	
	
		<select id="provincia" name="provincia" required class="form-control">
				<option <?php echo $reg['id_provincia'];?>selected><?php echo $reg['provincia'];?></option>
				
					<?php while($reg2=mysqli_fetch_array($todaslasprovincias))
					{
					?>
					
				<option value="<?php echo $reg2['id_provincia'];?>" selected><?php echo $reg2['provincia'];?></option> 
				
				<?php
					} 
					mysqli_close($conexion);
					?>	
		</select>			
	<br/><br/>
	<button type="submit">Modificar</button>
	<button type="reset">Cancer</button>
					
	</form></div></div>
	<?php
		}
		
	?>

	</body>
</html>