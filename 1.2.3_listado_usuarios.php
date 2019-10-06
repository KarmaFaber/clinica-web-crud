
<?php 
if (!isset($_COOKIE['sesion']))
{
	header("location:pagina_error.php");
}

$conexion=mysqli_connect("localhost","root","","clinica") or die("error al conectar con la base de datos".mysqli_error($conexion));


mysqli_set_charset($conexion, "utf8");
$registro=mysqli_query($conexion, "select usuarios.nombre, usuarios.email, usuarios.contasenia, usuarios.tipo from usuarios") or die("error al consultar los datos del usuario".mysqli_error($conexion));

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado Usuario</title>
	<link rel="icon" type="image/jpeg" href="images/icons/favicon_01.jpg" /> <!--icono personalizado en el navegador--->
	<link rel="stylesheet" href="css/estilo.css">
	
	<script>
	</script>
	
	<style>
	</style>
</head>

<body>
	<div class="jumbotron text-center"><h1>Listado Usuarios.</h1></div>
	<?php
	include("menu.php");
	?>
	
	<?php
		if ($_COOKIE['sesion']==3 or $_COOKIE['sesion']==2)
		{
			echo "<h1 style='color:#BE112E; text-align:center;'> no tiene nivel de acceso suficiente para acceder a este apartado</h1><br/><a href='0_index.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Entrar como administrador</a>";
		}
		?>
		
		<?php
		if ($_COOKIE['sesion']==1)
		{
		?>
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<table class="table table-bordered table-success">
				<thead class="thead-danger text-center">
					<tr class="bg-primary">
						<th>Nombre Usuario</th>
						<th>Email</th>
						<th>Tipo de Usuario</th>
						<th style="text-align: center;">Modificar</th>
						<th style="text-align: center;">Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while($reg=mysqli_fetch_array($registro))
						{
					?>
					<tr>
						<td><?php echo $reg['nombre'];?></td>
						<td><?php echo $reg['email'];?></td>
						
						<td><?php echo $reg['tipo'];?></td> <!--revisar este formato con js--->
						
						<td style="text-align: center;"><a href="1.2.5_formulario_modif_usuario.php?nombre=<?php echo $reg['nombre'];?>"><i class="fas fa-user-edit"></i></a></td>
						<td style="text-align: center;"><a href="1.2.4_eliminarusuario.php?nombre=<?php echo $reg['nombre'];?>"><i class="fas fa-trash"></i></a></td>
						
						<?php
						}
						}
						mysqli_close($conexion);
						?>
					</tr>
				</tbody>
			</table>
		</div> <!--fin div col 8 de la tabla central--->
	
	</div>

</body>
</html>