<?php

$conexion=mysqli_connect("localhost","root","","clinica") or die ("Error al conectar con la base de datos".mysqli_error($conexion));
mysqli_set_charset($conexion, "utf8");

$dni=$_REQUEST['dni'];
$nombre=$_REQUEST['nombre'];
$apellidos=$_REQUEST['apellidos'];
$edad=$_REQUEST['edad'];
$idprovincia=$_REQUEST['id_provincia'];

$registro=mysqli_query($conexion,"select dni, nombre, apellidos from paciente where dni='$dni'") or die ("error al realizar la consulta");
$cantidad=mysqli_num_rows($registro);

if ($cantidad!=0)
{

mysqli_query($conexion, "update paciente set nombre='$nombre', apellidos='$apellidos', edad=$edad, id_provincia=$idprovincia where dni='$dni'") or die ("Error al realizar la modificación.  ".mysqli_error($conexion));


header('location:3.2.1_listado_pacientes.php?cartel=2'); /*al terminar la consulta volvemos a la lista de pacientes*/
}






mysqli_close($conexion);
?>