<?php
	setcookie("sesion","",time()-1000,"/");
	setcookie("nombre","",time()-1000,"/");
	header("Location:0_index.php");
?>