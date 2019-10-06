<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login ZoMbIe.</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<?php
	if (isset($_COOKIE['sesion']))
	{
	?>
	<br/>
	<p>Usuario logueado- <a href="cerrarsesion.php">Cerrar sesión</a></p> <!---modificar esto--->
	
	<?php
	}
	else
	{
	?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>
				
<?php
$conexion=mysqli_connect("localhost", "root", "", "clinica") or die("Error al conectar a la base de datos");
mysqli_set_charset($conexion, "utf8");

 ?>
				<form class="login100-form validate-form" action="1.1_cookie_sesion.php" method="get"> <!--aqui mandamos el form a autentificar el usuario con el alta cookie--->
					<span class="login100-form-title">
						Login del Trabajador.
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="usuario" placeholder="Usuario o Email" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-user"></i>
						</span>
					</div>
					

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="contrasenia" placeholder="Contraseña" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Olvidaste
						</span>
						<a class="txt2" href="#">
							Usuario / Contraseña?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="1.2.1_alta_usuario.php">
							Crear cuenta Nueva.
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
<?php	
	}
	
?>					
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>