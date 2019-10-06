<?php
$conexion=mysqli_connect("localhost","root", "", "clinica") or die("Error al conectarse con la base de datos");
?>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--FontAwesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	
	<!--BOOTSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<!---->
	
  
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="2_clinica.php"><i class="fas fa-biohazard"></i> Inicio <i class="fas fa-skull"></i></a>
    </div>
	
    <ul class="nav navbar-nav">
      
	  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fas fa-user-injured"></i> Pacientes <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="3.1.1_nuevo_paciente.php"><i class="fas fa-user-edit"></i> Alta Paciente</a></li>
          <li><a href="3.2.1_listado_pacientes.php"><i class="fas fa-clipboard-list"></i> Listado paciente</a></li>
		  
        </ul>
      </li> 
    </ul>
	
	
	<!--parte derecha del menú-->
    <ul class="nav navbar-nav navbar-right">
		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fas fa-user-md"></i> Personal<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="4.1.1_nuevo_enfermero.php"><i class="fas fa-user-edit"></i> Alta Enfermero</a></li>
		  <li><a href="4.2.1_listado_enfermeros.php"><i class="fas fa-clipboard-list"></i> Listado enfermeros</a></li><hr/>
        </ul>
      </li>
		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fab fa-gitkraken"></i> Admin <span class="caret"></span></a>
			<ul class="dropdown-menu">
			  <li><a href="1.2.1_alta_usuario.php"><i class="fas fa-user-plus"></i> Alta Usuario</a></li>
			  <li><a href="1.2.3_listado_usuarios.php"><i class="fas fa-user-plus"></i> Listado Usuarios</a></li>
			</ul>
		</li>
		
		
		
		<li><a href="cerrarsesion.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
    </ul><!--fin parte derecha de menu--->
  </div>
  
</nav>



