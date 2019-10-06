<?php

$conexion=mysqli_connect("localhost","root","","clinica") or die ("Error al conectar con la base de datos".mysqli_error($conexion));
mysqli_set_charset($conexion, "utf8");

$dni=$_REQUEST['dni'];
$nombre=$_REQUEST['nombre'];
$apellidos=$_REQUEST['apellidos'];
$especialidad=$_REQUEST['especialidad']; /*ojo esto*/
$provincia=$_REQUEST['provincia'];



mysqli_query($conexion, "update enfermeros set nombre='$nombre', apellidos='$apellidos', cod_especialidad=$especialidad, id_provincia=$provincia where dni='$dni'") or die ("Error al realizar la modificación en enfermeros".mysqli_error($conexion));
mysqli_close($conexion);
header('location:4.2.1_listado_enfermeros.php?opc=2');



?>