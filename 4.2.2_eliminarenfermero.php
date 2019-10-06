<?php

$dni=$_REQUEST['dni'];
$conexion=mysqli_connect("localhost", "root", "", "clinica") or die("error al entrar en la base de datos");
mysqli_query($conexion,"delete from enfermeros where dni='$dni'") or die("error al realizar la consulta");
mysqli_close($conexion);

header("location:4.2.1_listado_enfermeros.php?opc=1"); /*redireccionamos la pag a la pag de listado*/
?>