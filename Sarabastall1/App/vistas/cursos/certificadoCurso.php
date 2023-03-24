<?php

// print_r($datos["nombreCurso"]); //exit();
// //HACER FOREACH DE NOMBRE+APELLIDOS CON UN ADDPAGE()

$fecha_inicio = $datos["nombreCurso"]->Fecha_Inicio; 
$fecha_fin = $datos["nombreCurso"]->Fecha_Fin; 
$inicio = date("d-m-Y", strtotime($fecha_inicio));
$fin = date("d-m-Y", strtotime($fecha_fin));
if ($fecha_inicio == $fecha_fin) {

    $htmlFecha = 'realizado el dia ' . $inicio;

}else{

    $htmlFecha = 'realizado desde el dia '. $inicio. " hasta el dia ". $fin;

}



ini_set("memory_limit", "128M");
//require_once 'tcpdf/tcpdf.php';
//require_once($_SERVER['DOCUMENT_ROOT'].'/tcpdf/tcpdf.php'); 
//require_once dirname( __FILE__ ) . '/tcpdf/tcpdf.php';
ob_end_clean(); //limpiar la memoria


class MYPDF extends TCPDF {
    public function Header() {
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
        $img_file =RUTA_APP.'/../public/img/diploma.png';
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();
    } 
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sarabastall');

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



foreach ($datos['aprendicesCurso'] as $alumno) {
    
    $pdf->AddPage();
    
    /*Nombre completo del cliente*/
    $pdf->SetFont('Helvetica', 'B', 50, '', 'false');
    $pdf->SetXY(100, 100);
    $pdf->Rotate(-90);
    $pdf->Cell(0,0, ($alumno->Nombre. " " . $alumno->Apellido), 0, 0,  'C');

    /*Texto*/
    $pdf->SetFont('Helvetica', 'A', 20, '', 'false');
    $pdf->SetXY(100, 80);
    $pdf->Cell(0,0, ('Este certificado acredita que'),0,0,'C');

    /*centro*/
    $pdf->SetFont('Helvetica', 'A', 16, '', 'false');
    $pdf->SetXY(100, 130);
    $pdf->Cell(0,0, ('ha concluido con éxito su formación en el curso de '. $datos["nombreCurso"]->Nombre),0,0,'C');

    /*fechas*/
    $pdf->SetFont('Helvetica', 'A', 16, '', 'false');
    $pdf->SetXY(100, 140);
    $pdf->Cell(0,0, ($htmlFecha),0,0,'C');

    // /*firma1*/
    $pdf->SetFont('Helvetica', 'A', 16, '', 'false');
    $pdf->SetXY(100, 170);
    $pdf->Cell(0,0, ('_________________'),0,0,'C');

    // /*firma2*/
    $pdf->SetFont('Helvetica', 'A', 16, '', 'false');
    $pdf->SetXY(100, 176);
    $pdf->Cell(0,0, ('Organizador del curso'),0,0,'C');
}







$pdf->Output('Certificados_alumnos_'.date('d_m_y').'.pdf', 'I');




?>
