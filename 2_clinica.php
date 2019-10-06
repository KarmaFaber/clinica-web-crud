<?php
if (!isset ($_COOKIE['sesion']))
{
	header("location:pagina_error.php");
}
?>

<!doctype html>
<html>
<head> 
  <meta charset="utf-8">
  <title>Clínica</title>
  <link rel="stylesheet" href="css/estilo.css">
	<link rel="icon" type="image/jpeg" href="images/icons/favicon_01.jpg" />
  
  <style>
  .content{padding-left:30px; padding-right:15px; }
  h3{text-align:center; padding-bottom:30px; padding-top:20px;}
  </style>
</head>

<body>
 <header class="jumbotron text-center"><h1>Ejercicio Clínica</h1></header>
 <?php
 include("menu.php");
 ?>

 
 <h3><i class="fab fa-earlybirds"></i> Contenido de los archivos de este ejercicio y orden de ejecución.<i class="fab fa-earlybirds"></i></h3>
 
<div class="content">


 <!-- card 1: 0_index.php-->

	<div class="card col-sm-12"><!--div lista-->
	
	<ul class="list-group list-group-flush">
		<li class="list-group-item">
		<b>0_index.php</b> la pag de inicio donde el ususario obligatoriamente tiene que identificarse o registrarse para poder acceder al sistema. Tenemos 3 nveles de acceso: admin, usuario e invitado controlado por cookies.<br/><br/> 
		
<!-----------------------------------todo este chorrizo es el modal_1.1_cookie_sesion.php--------------------------------->
			
				
					<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
			<i class="fas fa-code"></i> 1.1_cookie_sesion.php</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle"> <i class="fas fa-file-code"></i> <b> 1.1_cookie_sesion.php</b></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
					</button>
				  </div>
				  <div class="modal-body">
        <!--codigo-->
&lt;?php
	$conexion=mysqli_connect("localhost","root","","clinica") or die ("error al conectar");<br/>
	
	if (isset($_REQUEST['usuario']) and isset($_REQUEST['contrasenia']))<br/>
	{<br/>
		$usuario=mysqli_real_escape_string($conexion, $_REQUEST['usuario']); /*se carga los caracteres especiales para que los piratas infromaticos puedan haquear */<br/><br/>
		
		$contrasenia = mysqli_real_escape_string($conexion, $_REQUEST['contrasenia']);<br/>
		$encriptada = md5($contrasenia);<br/><br/>
		
		$registro=mysqli_query($conexion, "select nombre, email, contasenia, tipo from usuarios where contasenia='$encriptada' and (nombre='$usuario' or email='$usuario')") or die("error al realizar la consulta".mysqli_error($conexion)); <br/><br/>
		
		$cantidad=mysqli_num_rows($registro);<br/>
		if($cantidad==0) /*ojo aqui es ==0 !!*/<br/>
		{<br/>
			header ("location:error_login.php");<br/>
		}<br/>
		else<br/>
		{<br/>
			$reg=mysqli_fetch_array($registro);<br/>
			setcookie("sesion",$reg['tipo'],time()+10000,"/");<br/>
			setcookie("nombre",$reg['nombre'],time()+1000,"/");<br/>
			header("location:2_clinica.php");<br/>
		}<br/>
	}<br/>
	else<br/>
	{		<br/>
		header("location:error_login.php");<br/>
	}<br/>
?&gt;			
<br/>
				
		<!--fin codigo-->
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	  </div>
	</div>
		  
<!------------------------------------------------------fin del modal----------------------------------------------->
		<br/><br/> 
		</li>
		
		<li class="list-group-item"><b>1.1_cookie_sesion.php</b> &Rarr; archivo php de verificación de usuario y contraseña, a la vez creamos la cookie con esos datos. Hay dos posibilidades: <br/><br/> 
		<!-----------------todo este chorrizo es el modal 1.1_entrarusuario.php--------------------------------->
					<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
			  <i class="fas fa-code"></i> 1.1_entrarusuario.php
			</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle"> <i class="fas fa-file-code"></i> <b>1.1.entrarusuario.php</b></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
					</button>
				  </div>
				  <div class="modal-body">
        <!--codigo-->
					&lt;?php <br/>
					$conexion=mysqli_connect("localhost","root","","clinica") or die ("Error al conectar con la base de datos".mysqli_error($conexion));<br/>
					mysqli_set_charset($conexion, "utf8");<br/><br/>

					$usuario=$_REQUEST['usuario'];<br/><br/>

					$contrasenia=$_REQUEST['contrasenia']; <br/>
					$encriptada=md5($contrasenia);<br/><br/>

					$registro=mysqli_query($conexion, "select nombre, email, contasenia from usuarios where contasenia='$encriptada' and (nombre='&usuario' or email='$usuario')") or die("error al realizar la consulta".mysqli_error($conexion)); <br/><br/><br/>


					$cantidad=mysqli_num_rows($registro);<br/><br/>

						if($cantidad==0)<br/>
							{ <br/>
							header ("location:error_login.php");<br/>
							}<br/>
						else<br/>
							{<br/>
							header("location:2_clinica.php");<br/>
							}<br/><br/>

					mysqli_close($conexion);<br/>
					?&gt;<br/>
				
				<!--fin codigo-->
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			  </div>
			</div>
<!------------------------------------------------------fin del modal-----------------------------------------------><br/>
				<ul>
					<li>El usuario ingresa correctamente los datos y accede a la zona de trabajo  &Rarr; <b>2_clinica.php</b></li>
					<li>El usuario mete mal los datos, el sistema no encuentra los datos metidos y salta pagina de error &Rarr; <b>error_login.php</b><br/></li>
				</ul><br/>
		</li>
		<li class="list-group-item">1.2 Alta Usuario:
			<ul>
			<li><b>1.2.1_alta_usuario.php</b> &Rarr;  formulario html de alta de usuario. Al loro con los formularios, si no controlamos la cantidad de caractéres que ingresa el usuario nos da error al comparar los datos entre el formulario y la BD por que la limitación de la BD recortara el nº de caracteres que hemos definido en vez de coger el valor introducido por el usuario. <br/><br/> 
			<!-----------------todo este chorrizo es el modal_1.2.1_alta_usuario.php------------>
			
					<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
			<i class="fas fa-code"></i> 1.2.1_alta_usuario.php</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle"> <i class="fas fa-file-code"></i> <b>1.2.1_alta_usuario.php</b></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
					</button>
				  </div>
				  <div class="modal-body">
        <!--codigo-->
&lt;?php<br/>
$conexion=mysqli_connect("localhost", "root", "", "clinica") or die("Error al conectar a la base de datos");<br/>
mysqli_set_charset($conexion, "utf8");<br/>
?&gt;<br/><br/>
 
	&lt;form action="1.2.2_altausuario.php" method="get"&gt; <br/>
	&lt;div class="row"&gt;<br/>
	&lt;div class="col sm-6 offset-sm-2"&gt;<br/>
	Nombre de usuario&lt;input type="text" name="nombre" id="nombre" required class="form-control" placeholder="usuario"&gt;<br/>
	Email &lt;input type="email" name="email" id="email" required class="form-control" placeholder="e-mail"&gt;<br/>
	Contraseña &lt;input type="password" name="contrasenia" id="contrasenia" required class="form-control" placeholder="contraseña"&gt;<br/>
	Tipo de usuario  <br/><br/>
	&lt;select id="usuario" name="usuario" class="form-control"&gt;<br/>
		&lt;option disabled selected&gt;Escoja una opción.&lt;/option&gt;<br/>
		&lt;option value="001"&gt;Administrador&lt;/option&gt;<br/>
		&lt;option value="002"&gt;Usuario&lt;/option&gt;<br/>
		&lt;option value="003"&gt;Invitado&lt;/option&gt;<br/>
	&lt;/select&gt;<br/>
	
	<br/><br/>
	
	&lt;button type="submit"&gt;Enviar&lt;/button&gt;<br/>
	&lt;/form&gt;<br/><br/>
	
&lt;?php	<br/>
mysqli_close($conexion);<br/>
?&gt;<br/>
				
		<!--fin codigo-->
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	  </div>
	</div>
		  
<!------------------------------------------------------fin del modal-----------------------------------------------><br/>
</li><br/>
				
				<ul>
					<li><b>menu_2.php</b>: es un include del menú con botones bloqueados para usuarios con acceso restringido. </li>
				</ul>
			</li>
			<li><b>1.2.2_altausuario.php</b> &Rarr;  consulta php y sql para hacer el alta de usuario y registrar los datos en la bd.<br/><br/>
<!-----------------------------------todo este chorrizo es el modal_1.2.2_altausuario.php--------------------------------->
			
					<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
			<i class="fas fa-code"></i> 1.2.2_altausuario.php</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle"> <i class="fas fa-file-code"></i> <b>1.2.2_altausuario.php</b></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
					</button>
				  </div>
				  <div class="modal-body">
        <!--codigo-->
&lt;?php <br/>
$conexion=mysqli_connect("localhost","root","","clinica") or die("Error al conectar a la base de datos");<br/> <br/><br/>


$nombre=$_REQUEST['nombre'];<br/>
$email=$_REQUEST['email'];<br/>
$contrasenia=$_REQUEST['contrasenia'];<br/>
$encriptada=md5($contrasenia);<br/><br/>

$usuario=$_REQUEST['usuario'];<br/><br/><br/>


$registro=mysqli_query($conexion, "select nombre, email from usuarios where nombre='$nombre' or email='$email'") or die("error al realizar la consulta");<br/><br/><br/>


$cantidad=mysqli_num_rows($registro);<br/><br/>

	if($cantidad==0)<br/>
	{<br/>
		mysqli_query($conexion, "insert into usuarios(nombre, email, contasenia, tipo) values('$nombre', '$email', '$encriptada', $usuario)") or die("Error al generar el alta".mysqli_error($conexion));<br/>
		echo "el alta de usuario se realizo correctamente";<br/>
	}<br/>
	else<br/>
	{<br/>
		$reg=mysqli_fetch_array($registro);<br/>
		echo "El usuario".$reg['nombre']." ya existe";<br/>
	}<br/><br/>

	header("location:2_clinica.php");<br/>
mysqli_close($conexion);<br/><br/>

?&gt;			<br/>
				
		<!--fin codigo-->
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	  </div>
	</div>
		  
<!------------------------------------------------------fin del modal-----------------------------------------------><br/></li>
<br/>
			
			<li><b>1.2.3_listado_usuarios.php</b> &Rarr; listado en formato html combinadas con php para la gestión de los datos entre páginas. Para mas detalle ver archivo 1.2.3_listado_usuarios.php </li><br/>
			
			<li><b>1.2.4_eliminarusuario.php</b> &Rarr; combinadas php y consulta en mysql para elimnar elemento escogdo en el listado de usuarios.<br/><br/><!-----------------------------------todo este chorrizo es el modal_1.2.4_eliminarusuario.php--------------------------------->
			
					<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
			<i class="fas fa-code"></i> 1.2.4_eliminarusuario.php</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle"> <i class="fas fa-file-code"></i> <b>1.2.4_eliminarusuario.php</b></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
					</button>
				  </div>
				  <div class="modal-body">
        <!--codigo-->
&lt;?php
$nombre=$_REQUEST['nombre'];
$conexion=mysqli_connect("localhost", "root", "", "clinica") or die("error al entrar es la base de datos");
$registro=mysqli_query($conexion, "delete from usuarios where nombre='$nombre'") or die("error al realizar la consulta");

echo "&lt;h2 style='text-align:center; color:green; padding-top:50px;'>Se ha eleiminado el usuario correctamente.</h2>
	<br/><br/>
	&lt;p style='text-align:center; padding-top:10px;'>
	&lt;button type='button'>&lt;a href='1.2.3_listado_usuarios.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Ir a la lista.</a></button>  
	&lt;button type='button'>&lt;a href='2_clinica.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Ir al Inicio.</a>
	</button></p>";

mysqli_close($conexion);	
?>
				
		<!--fin codigo-->
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	  </div>
	</div>
		  
<!------------------------------------------------------fin del modal-----------------------------------------------><br/></li>
<br/></li>
			
			<li><b>1.2.5_formulario_modif_usuario.php</b> &Rarr; formulario en formato html combinado con php para la gestión de los datos entre páginas. Para mas detalle ver archivo 1.2.5_formulario_modif_usuario.php<br/></li><br/>
			
			<li><b>1.2.6_modificar_usuario.php</b> &Rarr; consulta php y mysql.<br/><br/><!-----------------------------------todo este chorrizo es el modal_1.2.6_modificar_usuariousuario.php--------------------------------->
			
					<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
			<i class="fas fa-code"></i> 1.2.6_modificar_usuariousuario.php</button>

			<!-- Modal -->
			<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle"> <i class="fas fa-file-code"></i> <b>1.2.6_modificar_usuariousuario.php</b></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
					</button>
				  </div>
				  <div class="modal-body">
        <!--codigo-->
&lt;?php<br/>
$conexion=mysqli_connect("localhost", "root", "", "clinica") or die("error al conectar con la base de datos".mysqli_error($conexion));<br/>
mysqli_set_charset($conexion, "utf8");<br/><br/>

$nombre=$_REQUEST['nombre'];<br/>
$email=$_REQUEST['email'];<br/><br/>

$contrasenia=$_REQUEST['contrasenia'];<br/>
$encriptada=md5($contrasenia);<br/><br/>

$usuario=$_REQUEST['usuario'];<br/><br/>

mysqli_query($conexion, "update usuarios set nombre='$nombre', email='$email', contasenia='$encriptada', tipo=$usuario where nombre='$nombre'") or die("error al realizar la modificación.  ".mysqli_error($conexion));<br/><br/>

echo "&lt;h2 style='text-align:center; color:green; padding-top:50px;'>Se ha modificado el usuario correctamente.</h2><br/>
	<br/><br/>
	&lt;p style='text-align:center; padding-top:10px;'><br/>
	&lt;button type='button'>&lt;a href='1.2.3_listado_usuarios.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Ir a la lista.</a></button>  <br/>
	&lt;button type='button'>&lt;a href='2_clinica.php' class='btn btn-outline-success' role='button' aria-pressed='true'>Ir al Inicio.</a>
	</button></p>";<br/>

mysqli_close($conexion);<br/>
?>
				
		<!--fin codigo-->
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	  </div>
	</div>
		  
<!------------------------------------------------------fin del modal-----------------------------------------------><br/></li>
				</li>
			</ul> 
		</li>
	  </ul>
	</div><!--fin div lista-->


<!-- card 2: 2_clinica.php-->

	<div class="card col-sm-12"><!--div lista-->
	
	<ul class="list-group list-group-flush">
		<li class="list-group-item">
		<b>2_clinica.php</b>: &Rarr; es esta página. Contiene contenido explicativo con respecto al ejercicio y es el inicio con los enlaces a diferentes consultas(contenido en <b>menu.php</b>). A esta pag no se puede acceder a no ser que estes dado de alta o logeado. Tiene el menu con los diferentes tipos de apartados: pacientes y trabajadores. A partir de la siguiente eleccion definimos las restricciones de tipo de admin para enseñar datos y dejar modificarlos.
		</li>
		
	</ul><!--fin ul--->
	</div><!--fin div lista card 2-->
	
<!-- card 3: pacientes-->

	<div class="card col-sm-12"><!--div lista-->
	
	<ul class="list-group list-group-flush">
		<li class="list-group-item">
		3.1 alta de pacientes: <br/>
		<ul>
		<li><b>3.1.1_nuevo_paciente.pfp</b>: &Rarr; el formulario de alta del paciente. </li><br/>
		<li><b>3.1.2_insertar_paciente.php</b> &Rarr; archivo php con la consultas de verificación de que el paciente que introducimos no existe y dar de alta.<br/></li>
		</ul>
		</li>
		
		
		<li class="list-group-item">
		3.2 lista paciente:
		<ul>
		<li><b>3.2.1_listado_pacientes.php</b> &Rarr; una pag en forma de tabla con los datos de los pacientes sacados previamente de la base de datos y plasmados en la forma que queremos(en este caso tabla). En esta pag mezclamos: html para la estructura de la pag y la tabla, php y sql para las consultas de los datos que nos rellenan los datos, javascript para mensajes inteeractivos varios, cookies para definir el nivel de acceso segun el tipo de usuario.</li><br/>
		<li><b>3.2.2_eliminarpaciente.php </b> &Rarr; archivo php. </li><br/>
		<li><b>3.2.3_formulario_modif_paciente.php </b> &Rarr; Combinamos html para definir el formato del fromulario y php/sql para hacer la consulta de los datos de la BD y mandar las modificaciones.<br/>Al loro con tener clave foraneas en las tablas de la BD ya que no te dejara borrar los datos si el paciente esta vinculado a varias tablas y saldra error no controlado.</li><br/>	
		<li><b>3.2.4_moificar_paciente.php </b> &Rarr; En este arch php hacemos la consulta de mandar los datos recogidos en el foromulario anterior.</li><br/>	
		</ul>		
		</li>
	  </ul><!--fin ul--->
	</div><!--fin div lista card 3-->	
	
	
<!-- card 4: PERSONAL-->

	<div class="card col-sm-12"><!--div lista-->
	
	<ul class="list-group list-group-flush">
		
		<li class="list-group-item">
		4.1 alta de enfermeros: <br/>
		<ul>
		<li><b>4.1.1_nuevo_enfermero.pfp</b>: &Rarr; el formulario de alta de enfermero nuevo comprobando previamente que ya no existe un enfermero con el dni igual para evitar dumplicar datos. Este arch tiene dos consultas combinadas: provincias y especialidad.</li><br/>
		<li><b>4.1.2_insertar_enefermero.php</b> &Rarr; archivo php con la consultas de verificación de que el enfermero que introducimos no existe y dar de alta.<br/></li>
		</ul>
		</li>
		
		
		<li class="list-group-item">
		4.2 lista de enfermeros:
		<ul>
		<li><b>4.2.1_listado_enfermero.php</b> &Rarr; una pag en forma de tabla con los datos de los enfermeros sacados previamente de la base de datos y plasmados en la forma que queremos(en este caso tabla). En esta pag mezclamos: html para la estructura de la pag y la tabla, php y sql para las consultas de los datos que nos rellenan los datos, javascript para mensajes inteeractivos varios, cookies para definir el nivel de acceso segun el tipo de usuario.</li><br/>
		<li><b>4.2.2_eliminarenfermero.php </b> &Rarr; archivo php.</li><br/>
		<li><b>4.2.3_formulario_modif_enfermero.php </b> &Rarr; Combinamos html para definir el formato del fromulario y php/sql para hacer la consulta de los datos de la BD y mandar las modificaciones.</li><br/>		
		<li><b>4.2.4_moificarenfermero.php </b> &Rarr; En este archivo php hacemos la consulta de mandar los datos recogidos en el foromulario anterio</li>	<br/>
		</ul>		
		</li>
		
	  </ul><!--fin ul--->
	</div><!--fin div lista card 4-->	

	
<!-- card 5: otros archivos de la pag-->
	<div class="card col-sm-12"><!--div lista-->
	
	<ul class="list-group list-group-flush">
		
		<li class="list-group-item">
			Otros Archivos de esta pag:
		<ul>
			
			
			<li><b>cerrarsesion.php</b>: &Rarr; cerrar cesión para las cookies.<!---incertar modal_cerrarsesion.php--><br/></li>
			<li><b>error_login.php</b>: &Rarr; una pag de advertencia cuando la consulta de verificación de usuario no reconoce al usuario. Esta pag da opcion de redireccionar a: login (0_index.php) o alta de nueo usuario (1.2.1_alta_usuario.php).<!---incertar modal_error_login.php--><br/></li>
			<li><b>pagina_error.php</b>: &Rarr;  </li>
			<li>personalizar el icono del navegador: ponemos esta linea de código en head y pasamos el icono que deselamos poner al formato correspondiente. &lt;link rel="icon" type="image/jpeg" href="images/icons/favicon_01.jpg" /></li>
		</ul>
		
		</li>
	</ul><!--fin ul--->
	</div><!--fin div lista card 5-->
	
	
	
	<!-- card 6: recursos-->
	<div class="card col-sm-12"><!--div lista-->
	
	<ul class="list-group list-group-flush">
		
		<li class="list-group-item">
			Recursos:
		<ul>
			<li><a href="https://getbootstrap.com/">Bootstrap</a></li>
			<li><a href="https://fontawesome.com/">Font Awesome</a></li>
		</ul>
		
		</li>
	</ul><!--fin ul--->
	</div><!--fin div lista card 6-->
	
</div> <!--fin div content-->
</div><!--fin de algo importante de arriba-->
</body>
</html>

