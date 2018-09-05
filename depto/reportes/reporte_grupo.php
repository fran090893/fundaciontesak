<?php

//include 'plantilla.php';
//require '../../DB/conexion.php';
require('../../DB/conexion.php');
require('../../fpdf/fpdf.php');

$id_grupo=$_GET['id'];
$id_evento=$_GET['evento']; 


$query = "SELECT id_alumno, alumno_nombre,alumno_sexo, alumno_apellido , grupo.grupo_nombre AS grupo, grupo.id_departamento AS dept_alumno, departamento.departamento_nombre AS departamento FROM alumno INNER JOIN grupo on alumno.id_grupo = grupo.id_grupo INNER JOIN departamento on grupo.id_departamento = departamento.id_departamento WHERE NOT EXISTS (SELECT * FROM asistencia WHERE asistencia.id_alumno=alumno.id_alumno AND asistencia.id_evento= $id_evento) AND alumno.id_grupo = $id_grupo";
$valores =  $conexion ->prepare($query);
$valores ->execute();
class PDF extends fpdf{
    function Header()
    {
        require('../../DB/conexion.php');
        $evento=$_GET['evento'];
        $grupo=$_GET['id'];
        $query = "SELECT evento.fecha, evento.evento_nombre, grupo.grupo_nombre, grupo.grupo_encargado, departamento.departamento_nombre FROM `evento` 
        INNER JOIN grupo ON evento.id_grupo = grupo.id_grupo
        INNER JOIN departamento ON grupo.id_departamento = departamento.id_departamento
        WHERE evento.id_evento=$evento AND grupo.id_grupo=$grupo";

        $valores =  $conexion ->prepare($query);
        $valores ->execute();
        $datos1=$valores ->fetch();

        //$this->Image('images/log.jpg', 5, 5, 30 );
        $this->SetFont('Arial','B',15);
        $this->Cell(30);
        $this->Cell(120,8, 'Listado de alumnos',0,1,'C');
        $this->Ln(20);

        $this->Cell(120,8, 'Departamento:'.$evento);
        $this->Cell(120,8, 'Evento: '.$datos1["evento_nombre"],0,1,'');
        $this->Cell(120,8, 'Grupo: '.$datos1["grupo_nombre"],0,1,'');
        $this->Cell(120,8, 'Encargado de grupo: '.$datos1["grupo_encargado"],0,0,'');
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
$pdf->Cell(50,6,'sexo',1,1,'C',1);

$pdf->SetFont('Arial','',10);

while($datos1=$valores ->fetch())
{
    $pdf->Cell(50,6,utf8_decode($datos1['alumno_apellido']),1,0,'C');
    $pdf->Cell(50,6,utf8_decode($datos1['alumno_nombre']),1,0,'C');
    $pdf->Cell(50,6,utf8_decode($datos1['alumno_sexo']),1,1,'C');
}



$pdf->Output();



?>