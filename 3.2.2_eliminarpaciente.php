<?php

$conexion=mysqli_connect("localhost", "root", "", "clinica") or die ("error al entrar en la base de datos");


$dni=$_REQUEST['dni']; /*variable local ponemos el nombre que usamos en el name/url*/
mysqli_query($conexion,"delete from paciente where dni='$dni'") or die("error al realizar la consulta".mysqli_error($conexion));


mysqli_close($conexion);

 header("location:3.2.1_listado_pacientes.php?cartel=1"); /*redireccionamos la pag a la pag de listado*/

?>