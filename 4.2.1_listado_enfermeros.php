<?php
 if (!isset ($_COOKIE['sesion']))
 {
	 header("location:pagina_error.php");
 }

$conexion=mysqli_connect("localhost","root","","clinica") or die("Error al conectar con la base de datos".mysqli_error($conexion));

mysqli_set_charset($conexion, "utf8");

$registros=mysqli_query($conexion, "select enfermeros.dni, enfermeros.nombre, enfermeros.apellidos, especialidades.nombre as nespecialidades,provincias.provincia from enfermeros inner join provincias on provincias.id_provincia=enfermeros.id_provincia inner join especialidades on especialidades.cod_especialidad=enfermeros.cod_especialidad") or die("Error al consultar los datos".mysqli_error($conexion)); 	
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Listado enfermeros</title>
		<link rel="stylesheet" href="css/estilo.css">
	<link rel="icon" type="image/jpeg" href="images/icons/favicon_01.jpg" />
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
		  

		</script>
		
		
		<style>
		.mensaje
			{
			background-color:#6B158E;
			color:#F18410;
			}
		</style>
		
		<script>
			var dni; 
			function ocultar() <!--etiqueta interactiva que desaparece al x tiempo despues de enseñar el mensaj-->
			
			{
				$(".mensaje").fadeOut(5000); /*en milisegundos*/
			}
			
			
			function eliminar() <!--funcion asociada al modal de aviso antes de borrar un elemento de la BD--->
			{
				location.href="4.2.2_eliminarenfermero.php?dni="+dni;
			}			
			
			function verDatos(dniElegido, nombreElegido)<!--modal interactivo que salta cuando queremos hacer una acccion concreta, en los botones del modal definimos comandos concreos a hacer en la funcion script antes de seguir con el programa--->
			
			{
				dni=dniElegido;
				document.getElementById("pmodal").innerHTML="¿Esta seguro de que quiere eliminar a Nombre:"+ nombreElegido+"DNI: "+dniElegido +" ?"
			}
			
		</script>
	</head>
	
	<body onload="ocultar()">
	
		<div class="jumbotron text-center"><h1>Listado Enfermeros</h1></div>
		
		<?php
		include("menu.php");
		?>
		
		<?php
		if(isset($_REQUEST['opc']))
		{
			$accion=$_REQUEST['opc'];
			if($accion==1)
				{
					echo "<p class=\"mensaje\">Eliminación realizada</p>";	/*viene de 4.2.2_eliminar enfermero opc 1*/
				}
			else if ($accion==2)
				{
					echo "<p class=\"mensaje\">Modificación realizada</p>"; /*viene de 4.2.2_eliminar enfermero opc 1*/
				}
		}
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
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<table class="table table-striped">
					<thead class="thead-dark text-center">
						<tr>
							<th>DNI</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Especialidad</th>
							<th>Provincia</th>
							<th>Modificar</th>
							<th>Borrar</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						while ($reg=mysqli_fetch_array($registros))
						{
						?>
						<tr>
							<td><?php echo $reg['dni'];?></td>
							<td><?php echo $reg['nombre'];?></td>
							<td><?php echo $reg['apellidos'];?></td>
							<td><?php echo $reg['nespecialidades'];?></td>    <!------aqui queremos la espacialidad no el código/revisar ------>
							<td><?php echo $reg['provincia'];?></td>          <!--------queremos la provincia/ revisar-------->
							
					
							<td><a href="4.2.3_formulario_modif_enfermero.php?dni=<?php echo $reg['dni'];?>"><i class="fas fa-pen-nib"></i></td>
							
							
							<td><a href="#" data-toggle="modal" data-target="#confirmar" onclick="verDatos('<?php echo $reg['dni'];?>','<?php echo $reg['nombre'];?>')"><i class="fas fa-trash-restore-alt"></i></a></td>
						
						
						</tr>
						<?php
						}
						mysqli_close($conexion);
						?>
					</tbody>
				
				</table>
				<?php
		}
		?>
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