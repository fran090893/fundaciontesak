<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("location: admin/view/menu.php");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = $_POST['usuario'];
	$pass = $_POST['pass'];
	$Error=0;
	require('DB/conexion.php');

	$consulta = $conexion->prepare('SELECT * FROM usuario WHERE usuario = :usuario AND usuario_password = :pass');

	$consulta ->execute(array(':usuario'=>$usuario, ':pass'=>$pass ));

	$resultado = $consulta->fetch();

	if ($resultado!=false) {
		$_SESSION['usuario']=$usuario;
		$_SESSION['correo']=$resultado['usuario_correo'];
		$_SESSION['telefono']=$resultado['usuario_telefono'];
		$_SESSION['cargo']=$resultado['id_cargo'];
		$_SESSION['depto']=$resultado['id_departamento'];
         	if($_SESSION['cargo'] == 1){
				header('location: admin/view/menu.php');
	        }else if($_SESSION['cargo'] == 2){
				header('location: depto/view/menu.php');

			}else if($_SESSION['cargo'] == 3){
				header('location: colaborador/view/menu.php');
			}else{
				echo'<script type="text/javascript">
        alert("EL usuario no tiene permisos");
        window.location.href="login.php";
        </script>';
			}

	}
	else{

		echo '<script>location.href = "login.php?$Error=1"</script>';

	}
}



?>
