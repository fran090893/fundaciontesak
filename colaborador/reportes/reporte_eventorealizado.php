
<?php

//include 'plantilla.php';
//require '../../DB/conexion.php';
require('../../DB/conexion.php');
require('../../fpdf/fpdf.php');

$id_grupo=$_GET['id'];
$id_evento=$_GET['evento']; 


$query = "SELECT grupo.grupo_encargado as encargado,evento.fecha as fecha,alumno.id_alumno,alumno.alumno_nombre, alumno.alumno_apellido , grupo.grupo_nombre AS grupo, asistencia.asistencia,departamento.departamento_nombre AS dept_alumno, evento.evento_nombre FROM asistencia
INNER JOIN alumno ON alumno.id_alumno = asistencia.id_alumno
INNER JOIN grupo on grupo.id_grupo = alumno.id_grupo
INNER JOIN evento on evento.id_grupo = grupo.id_grupo
INNER JOIN departamento on departamento.id_departamento = grupo.id_departamento WHERE evento.id_evento =$id_evento";
$valores =  $conexion ->prepare($query);
$valores ->execute();
class PDF extends fpdf{
    function Header()
    {
        require('../../DB/conexion.php');
        $evento=$_GET['evento'];
        $grupo=$_GET['id'];
        $query = "SELECT grupo.grupo_encargado as encargado,evento.fecha as fecha,alumno.id_alumno,alumno.alumno_nombre, alumno.alumno_apellido , grupo.grupo_nombre AS grupo, asistencia.asistencia,departamento.departamento_nombre AS dept_alumno, evento.evento_nombre FROM asistencia
        INNER JOIN alumno ON alumno.id_alumno = asistencia.id_alumno
        INNER JOIN grupo on grupo.id_grupo = alumno.id_grupo
        INNER JOIN evento on evento.id_grupo = grupo.id_grupo
        INNER JOIN departamento on departamento.id_departamento = grupo.id_departamento WHERE evento.id_evento =  $evento";

        $valores =  $conexion ->prepare($query);
        $valores ->execute();
        $datos1=$valores ->fetch();

        //$this->Image('images/log.jpg', 5, 5, 30 );
        $this->SetFont('Arial','B',15);
        $this->Cell(30);
        $this->Cell(120,8, 'Listado de alumnos',0,1,'C');
        $this->Ln(20);

        $this->Cell(120,8, 'Departamento:'.$datos1["dept_alumno"]);
        $this->Cell(120,8, 'Evento: '.$datos1["evento_nombre"],0,1,'');
        $this->Cell(120,8, 'Grupo: '.$datos1["grupo"],0,1,'');
        $this->Cell(120,8, 'Encargado: '.$datos1["encargado"],0,1,'');
        $this->Cell(120,8, 'Fecha: '.$datos1["fecha"],0,1,'');



            $this->Ln(20);

    }

    Function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I', 8);
        $this->Cell(0,10, 'Rportede ',0,0,'C');
    }
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,6,'Apellidos',1,0,'C',1);
$pdf->Cell(50,6,'Nombres',1,0,'C',1);
$pdf->Cell(50,6,'Asistencia',1,1,'C',1);

$pdf->SetFont('Arial','',10); 

while($datos1=$valores ->fetch())
{
    $pdf->Cell(50,6,utf8_decode($datos1['alumno_apellido']),1,0,'C');
    $pdf->Cell(50,6,utf8_decode($datos1['alumno_nombre']),1,0,'C');
    $pdf->Cell(50,6,utf8_decode($datos1['asistencia']),1,1,'C');
}



$pdf->Output();



?>