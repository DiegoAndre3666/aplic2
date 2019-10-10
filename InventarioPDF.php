<?php
session_start();

require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

class MYPDF extends TCPDF 
{

	//Page header
	public function Header() 
	{

		date_default_timezone_set('America/Sao_Paulo');

		// Obtem a data atual
		$datahoje = date("Y-m-d");
		$ano = substr($datahoje,0,4);
		$mes = substr($datahoje,5,2);
		$dia = substr($datahoje,8,2);

		$datahoje = $dia."/".$mes."/".$ano;

		$image_file = K_PATH_IMAGES.'logo_example.jpg';
		$this->Image($image_file, 3, 3, 16, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		$this->SetFont('helvetica', 'B', 12);
		// Title
		$this->Text(20,5, "FACULDADE PARANAENSE");
		$this->SetFont('helvetica', 'P', 10);
		$this->Text(20,10,"ALMOXARIFADO CENTRAL");
		$this->Text(190,5,$datahoje);
		$this->Text(20,15,"Inventário geral de estoque");
		$this->SetDrawColor(0, 0, 0);
		$this->Line(1,23,208,23); // e,t,l,t

	}

	// Page footer
	public function Footer() 
	{

	    // Position at 15 mm from bottom
	    $this->SetY(-15);
	    // Set font
	    $this->SetFont('helvetica', 'I', 8);
	    // Page number
	    $this->Cell(0, 10,'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

	}
}


$id = $_GET['id'];

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);
// remove default header/footer
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);
// set margins
$pdf->SetMargins(2, PDF_MARGIN_TOP,2);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->SetFont('helvetica', 'p',10); // I italic P plain B bold

$html = file_get_contents("http://localhost/aplic2/listaequipPDF.php?tipo=$id&funcao=abrir");

$pdf->AddPage('L', 'A4');
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->lastPage();

//Close and output PDF document
ob_end_clean();
$pdf->Output('relatorio.pdf', 'I');

?>


