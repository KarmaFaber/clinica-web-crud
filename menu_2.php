<?php
$conexion=mysqli_connect("localhost","root", "", "clinica") or die("Error al conectarse con la base de datos");
?>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="0_index.php">Clinica ZoMbIe</a>
    </div>
	
    <ul class="nav navbar-nav">
      
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Personal<span class="caret"></span></a>
        <ul class="dropdown-menu">
        </ul>
      </li>
	  
	  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Pacientes <span class="caret"></span></a>
        <ul class="dropdown-menu">
        </ul>
      </li> 
    </ul>
	
	
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
    </ul>
  </div>
</nav>



