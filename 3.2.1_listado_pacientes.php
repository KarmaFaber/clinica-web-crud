<?php
if (!isset ($_COOKIE['sesion']))
{
	header("location:pagina_error.php");
}


$conexion=mysqli_connect("localhost","root","","clinica") or die ("Error al conectar con la base de datos".mysqli_error($conexion));
			
mysqli_set_charset($conexion, "utf8");
			
$registros=mysqli_query($conexion, "select paciente.dni, paciente.nombre, paciente.apellidos, paciente.edad, provincias.provincia from paciente inner join provincias on provincias.id_provincia=paciente.id_provincia") or die("Error al consultar los datos".mysqli_error($conexion)); 
			
/* REVISAR ESTA CONEXION PARA PONERLA BIEN EN EL LISTA DE ENFERMERO*/ /*si nos coinciden 2 nombres y queremos usar un alias usamos _paciente.nombre as nombrePaciente_ para renombrar la variable por el alias.*/
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Listado de pacientes</title>
		<link rel="stylesheet" href="css/estilo.css">
	<link rel="icon" type="image/jpeg" href="images/icons/favicon_01.jpg" />
		
		
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

		<!--Iconos-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		
		<style>
		.mensaje
		{
		background-color:#6B158E;
		color:#F18410;
		}
		</style>
		
		<script>
			function ocultar()
			{
				$(".mensaje").fadeOut(5000); /*en milisegundos*/
			}
			
			var dni; 
			
			
			function eliminar() /*funcion asociada al modal de aviso antes de borrar un elemento de la BD*/
			{
				location.href="3.2.2_eliminarpaciente.php?dni="+dni;
			}			
			
			function verDatos(dniElegido, nombreElegido)/*modal interactivo que salta cuando queremos hacer una acccion concreta, en los botones del modal definimos comandos concreos a hacer en la funcion script antes de seguir con el programa*/
			
			{
				dni=dniElegido;
				document.getElementById("pmodal").innerHTML="¿Esta seguro de que quiere eliminar a Nombre:"+ nombreElegido+"DNI: "+dniElegido +" ?"
			}
			
		</script>
	</head>
	
	<body onload="ocultar()">
		
		
		
		<div class="jumbotron text-center"><h1>Listado pacientes.</h1></div>
		<?php
		include("menu.php");
		?>
		
		
		<?php
		
		if(isset($_REQUEST['cartel']))
		{
			$accion=$_REQUEST['cartel'];
			if($accion==1)
				{
					echo "<p class=\"mensaje\">Eliminación realizada</p>";	
				}
			else if ($accion==2)
				{
					echo "<p class=\"mensaje\">Modificación realizada</p>";
				}
		}
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
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<table class="table table-striped">
					<thead class="thead-dark text-center">
					<tr>
						<th>DNI</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Edad</th>
						<th>Provincia</th>
						<th>Modificar</th>
						<th>Eliminar</th>
					</tr>
					</thead>
					
					<tbody>
						<?php
							while($reg=mysqli_fetch_array($registros))
							{
						?>
						<tr>
							<td><?php echo $reg['dni'];?></td> <!---reg[] pondremos la variable de la base de datos-->
							<td><?php echo $reg['nombre'];?></td>
							<td><?php echo $reg['apellidos'];?></td>
							<td><?php echo $reg['edad'];?></td>
							<td><?php echo $reg['provincia'];?></td>
							
						
							<td><a href="3.2.3_formulario_modif_paciente.php?dni=<?php echo $reg['dni'];?>"><i class="fas fa-pen-nib"></i></td> <!--vamos al formulario_modif_paciente con los datos dni [XXXXXXXXX] del paciente--->
							
							<td><a href="#" data-toggle="modal" data-target="#confirmar" onclick="verDatos('<?php echo $reg['dni'];?>','<?php echo $reg['nombre'];?>')"><i class="fas fa-trash-restore-alt"></i></a></td>
						
						
						
						</tr>
						<?php
						}	
						}
						mysqli_close($conexion);
						?>
					</tbody>
				</table>
			
			</div>
			
			
		</div>
	<!---------MODAL------------>
	
	<div id="confirmar" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmación de eliminación.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true"><i class="fas fa-backspace"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <p id="pmodal">¿Esta seguro que quiere eliminar este elemento?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger"><i class="fas fa-user-times" onclick="eliminar()">Eliminar</i></button>
      </div>
    </div>
  </div>
</div>
	<!--FIN MODAL--->
	</body>
	
</html>