


<?php
require('../DB/conexion.php');


require("Classes/PHPExcel/IOFactory.php");
if (substr($_FILES['excel']['name'], -3)=="csv" || substr($_FILES['excel']['name'], -3)=="xls") {

	$fecha1 = date('y-m-a');

	$ruta = "../DB/archivos/";

	$excel = $fecha1."-".$_FILES['excel']['name'];
	move_uploaded_file($_FILES['excel']['tmp_name'], "$ruta$excel");

	$nombreArchivo="$ruta$excel";

$inputFileType = PHPEXCEL_IOFactory::identify($nombreArchivo);
$objReader = PHPEXCEL_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($nombreArchivo);

$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();

for ($i=2; $i <= $highestRow ; $i++) { 
	$nombre = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
	$apellido = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
	$fecha = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
	$sexo = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
	$instituo = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
	$grupo = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();

		$sql="INSERT INTO alumno(alumno_nombre, alumno_apellido,alumno_fecha,alumno_sexo, alumno_instituto, id_grupo) VALUES('$nombre','$apellido','$fecha','$sexo','$instituo','$grupo') ";

$consulta = $conexion ->prepare($sql);
		$consulta ->execute();
	
$cuenta = $consulta->rowCount();

if ($cuenta > 0) {
		echo '<script>location.href = "../view/agregartabla.php?Exito=1"</script>';
}
else
{
			echo '<script>location.href = "../view/agregartabla.php?Error=1"</script>';

}
}
}
else{
			echo '<script>location.href = "../view/agregartabla.php?Error=1"</script>';
}

?>






