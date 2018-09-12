<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Clase para la exportación de resultados a excel
 * @version 0.1 Primera version
 */
require_once APPPATH ."/third_party/fpdf/fpdf.php";

class Pdf extends FPDF
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Header()
    {
      $this->Image('./archivos/Feexpt.png', 15, 10, 30 );
      $this->SetFont('Arial','B',12 );
      $this->Cell(30);
      $this->Cell(135,10, utf8_decode('Lista de asistencia de alumnos'),0,1,'C');
      $this->Ln(7);
    }

    public function Footer()
    {
      $this->SetY(-15);
      $this->SetFont('Arial','I', 8);
      $this->Cell(0,10,utf8_decode('Fundación para la Educación Experencial Pablo Tesak '),0,0,'C');
    }




}

?>
