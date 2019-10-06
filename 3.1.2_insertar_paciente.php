
<?php
$conexion=mysqli_connect("localhost", "root", "", "clinica") or die("Error al conecta a la base de datos");

$dni=$_REQUEST['dni'];
$nombre=$_REQUEST['nombre'];
$apellidos=$_REQUEST['apellidos'];
$edad=$_REQUEST['edad'];
$idprovincia=$_REQUEST['provincia'];

$registro=mysqli_query($conexion, "select dni, nombre, apellidos from paciente where dni='$dni'") or die("error al realizar la consulta");

$cantidad=mysqli_num_rows($registro);
if($cantidad==0)
{
	mysqli_query($conexion, "insert into paciente(dni, nombre, apellidos, edad, id_provincia) values('$dni', '$nombre', '$apellidos', $edad, $idprovincia)") or die ("Error al generar el alta");
	echo ("
	<h2 style='text-align:center; color:green; padding-top:50px;'>El alta se realizo con exito.</h2>
	<br/>
	<p style='text-align:center; padding-top:10px;'>
	<a href='3.1.1_nuevo_paciente.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Ingresar otro paciente.</a>       
	<a href='3.2.1_listado_pacientes.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Listado.</a>     
	<a href='2_clinica.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Página inicio.</a>
	</p>");
}
else
{	
	$reg=mysqli_fetch_array($registro);
	echo "<h2 style='text-align:center; color:red; padding-top:50px;'>El paciente ".$reg['nombre']." ".$reg['apellidos']. " ya existe</h2>
	<br/>
	<p style='text-align:center; padding-top:10px;'>
	<a href='3.2.1_listado_pacientes.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Revisar lista.</a>   
	<a href='3.1.1_nuevo_paciente.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Volver a intentar.</a>
	</p>";
}
mysqli_close($conexion);
?>
