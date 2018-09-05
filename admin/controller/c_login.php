<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("location: menu.php");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = $_POST['usuario'];
	$pass = $_POST['pass'];
	$Error=0;
	require('../../DB/conexion.php');

	$consulta = $conexion->prepare('SELECT * FROM usuario WHERE usuario = :usuario AND usuario_password = :pass');

	$consulta ->execute(array(':usuario'=>$usuario, ':pass'=>$pass ));

	$resultado = $consulta->fetch();

	if ($resultado!=false) {
		$_SESSION['usuario']=$usuario;
		$_SESSION['correo']=$resultado['usuario_correo'];
		$_SESSION['telefono']=$resultado['usuario_telefono'];
		$_SESSION['cargo']=$resultado['id_cargo'];

		header('location: ../view/menu.php');

	}
	else{

		echo '<script>location.href = "../view/login.php?$Error=1"</script>';

	}
}



?>
