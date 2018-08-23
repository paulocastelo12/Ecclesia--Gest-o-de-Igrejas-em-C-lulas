<?php

class PDF extends FPDF {

// Page header
    function Header() {
        // Logo
        //$this->Image('http://localhost/Ecclesia/adm/assets/image/coroa.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->SetFillColor(173, 216, 230);
        $this->Cell(30, 10, utf8_decode('Relátorio de Células'), 0, 0, 'C');
    
        // Line break
        $this->Ln(15);
    }

// Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$valortotal = null;
$qtdparticipantes = null;
$cont = 0;
foreach ($this->Dados as $regcelula) {
    $cont++;
    $valortotal = $valortotal+$regcelula["regcelvalor"];
    $qtdparticipantes = $qtdparticipantes+$regcelula["regcelqdt_participantes"];
}

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(90, 10, utf8_decode('Total de Células: '.$cont), 0, 0, "l");
$pdf->Cell(50, 10, utf8_decode('Grupo: '.$this->Dados_editar['nomegrupo'][0]['grunome']), 0, 0, "l");
$pdf->Ln();
$pdf->Cell(90, 10, utf8_decode('Total Oferta: '. number_format($valortotal, 2, ",", ".")), 0, 0, "l");
$pdf->Cell(50, 10, utf8_decode('Responsáveis: '.$this->Dados_editar['nomegrupo'][0]['gruresponsavel1'].' & '.$this->Dados_editar['nomegrupo'][0]['gruresponsavel2']), 0, 0, "l");
$pdf->Ln();
$pdf->Cell(130, 10, utf8_decode('Total Particpantes: 0'.$qtdparticipantes), 0, 0, "l");
$pdf->Ln(15);


$pdf->SetFillColor(173, 216, 230);

$pdf->SetFont("Arial", "I", 8);
$pdf->Cell(10, 7, utf8_decode("Nº"), 1, 0, "C", true);
$pdf->Cell(30, 7, utf8_decode("Nome"), 1, 0, "C", true);
$pdf->Cell(40, 7, utf8_decode("Líder"), 1, 0, "C", true);
$pdf->Cell(30, 7, utf8_decode("Grupo"), 1, 0, "C", true);
$pdf->Cell(20, 7, utf8_decode("Nº pessoas"), 1, 0, "C", true);
$pdf->Cell(20, 7, utf8_decode("Oferta"), 1, 0, "C", true);
$pdf->Cell(20, 7, utf8_decode("Data"), 1, 0, "C", true);
$pdf->Cell(20, 7, utf8_decode("Status"), 1, 0, "C", true);
$pdf->Ln();
foreach ($this->Dados as $regcelula) {

    $pdf->Cell(10, 7, utf8_decode($regcelula["regcelcod"]), 1, 0, "C");
    $pdf->Cell(30, 7, utf8_decode($regcelula["celdescricao"]), 1, 0, "C");
    $pdf->Cell(40, 7, utf8_decode($regcelula["memnome"]), 1, 0, "C");
    $pdf->Cell(30, 7, utf8_decode($regcelula["grunome"]), 1, 0, "C");
    $pdf->Cell(20, 7, utf8_decode($regcelula["regcelqdt_participantes"]), 1, 0, "C");
    $pdf->Cell(20, 7, utf8_decode($regcelula["regcelvalor"]), 1, 0, "C");
    $pdf->Cell(20, 7, utf8_decode($regcelula["regceldata_realizacao"]), 1, 0, "C");
    $pdf->Cell(20, 7, utf8_decode($regcelula["regcelstatus_registro"]), 1, 0, "C");
    
    $pdf->Ln();
}

$pdf->Output();
?>