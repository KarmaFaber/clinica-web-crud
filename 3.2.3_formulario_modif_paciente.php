<?php
 if (!isset ($_COOKIE['sesion']))
 {
	 header("location:pagina_error.php");
 }
 
$conexion=mysqli_connect("localhost", "root", "", "clinica") or die("Error al conectar a la base de datos.");
mysqli_set_charset($conexion, "utf8");

$dni=$_REQUEST['dni'];

$registro=mysqli_query($conexion, "select paciente.dni, paciente.nombre, paciente.apellidos, paciente.edad, provincias.id_provincia, provincias.provincia from paciente inner join provincias on provincias.id_provincia = paciente.id_provincia where paciente.dni='$dni'") or die("Erro al consultar datos".mysqli_error($conexion)); /*hacemos una variable para que nos arroje los datos de 1 paciente con dni concreto*/ /*para poner alias ponesmos _as alias_*/

$reg=mysqli_fetch_array($registro); /*cogemos una fila por lo tanto no hacemos el while*/

$todaslasprovincias=mysqli_query($conexion, "select id_provincia, provincia from provincias order by provincia") or die("Error al consultar las provincias: ".mysqli_error($conexion)); /*consulta especifica para las provincias, vinculada a la tabla de datos de paciente*/
?>


<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Modificar Paciente</title>
		<link rel="stylesheet" href="css/estilo.css">
	<link rel="icon" type="image/jpeg" href="images/icons/favicon_01.jpg" />
		<style></style>
	</head>
	
	
	
	<body>
	
	
	<div class="head jumbotron text-center"><h1>Modificar Paciente</h1></div>
	<?php
	include("menu.php");
	?>
	
	
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
	<div class="row">
	<div class="content col-sm-5">
	
		<form action="3.2.4_modificar_paciente.php" method="get">
	<br/>
	
	
	Dni <input type="text" id="dni" name="dni" value="<?php echo $reg['dni'];?>" readonly class="form-control"> 
	<!------hay dos formas de enseñar el dato placeholder y value, no pueden ir a la vez y para modificar los datos usaremos value------->
	<!------readonly es para que ese campo no se pueda ni modificar ni borrar por que es una primary key y nos modifica muchas cosas------->
	
	
	Nombre <input type="text" id="nombre" name="nombre" value="<?php echo $reg['nombre'];?>" required class="form-control"><br/>
	Apellidos <input type="text" id="apellidos" name="apellidos" value="<?php echo $reg['apellidos'];?>" required class="form-control"><br/>
	Edad <input type="number" id="edad" name="edad" value="<?php echo $reg['edad'];?>" required class="form-control">
	<br/><br/>
	
	
	<select id="id_provincia" name="id_provincia" required class="form-control">
		
		<option selected value="<?php echo $reg['id_provincia'];?>"><?php echo $reg['provincia'];?></option> 
		
			<?php while($reg1=mysqli_fetch_array($todaslasprovincias))
			{
			?>
			
		<option value="<?php echo $reg1['id_provincia'];?>"><?php echo $reg1['provincia'];?></option> <!--ojo que mandamos en value el cogido id_provincia y en option mostramos al usuario el nombre de provincia--->
		
			<?php	
			}
			mysqli_close($conexion);
			?>		
	
	</select>
	

	<br/><br/>
	<button type="submit">Modificar</button>
	<button type="reset">Cancer</button>
	<?php
		}
		?> 
		</form>
		
	</div></div></div>
	</body>

</html>