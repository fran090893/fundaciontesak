<?php

		try{

			$conexion = new PDO("mysql:host=localhost;dbname=fundaciontesak","root","");

		}
		catch(PDOException $e){
			die($ex->getMessage());
		}



 ?>
