<?php

$isi='
    <p>
    <h3 align="center">LAPORAN BOOKING ROOM<br>TERAS MEETING ROOM</H3>
    <b>Periode : '.date_indo($tgl_awal).' - '.date_indo($tgl_akhir).'</b>
    </p>
    <table width="100%" border="1" cellpadding="2" cellspacing="0">
        <thead>
            <tr align="center">
                <th width="3%"><b>NO</b></th>
                <th width="15%"><b>BALLROOM</b></th>
                <th width="15%"><b>NO KTP</b></th>
                <th width="15%"><b>NAMA PELANGGAN</b></th>
                <th width="15%"><b>TGL BOOKING</b></th>
                <th width="15%"><b>TGL EVENT</b></th>
                <th width="12%"><b>DEPOSIT</b></th>
                <th width="10%"><b>STATUS</b></th>
            </tr>
        </thead>';
    foreach ($result as $r){
    $isi .='<tr>
                <td width="3%" align="center">'.++$start.'</td>
                <td width="15%">'.$r->nama_ballroom .'</td>
                <td width="15%" align="center">'.$r->no_ktp .'</td>
                <td width="15%">'.$r->nama_pelanggan .'</td>
                <td width="15%" align="center">'.date_indo($r->tgl_booking) .'</td>
                <td width="15%" align="center">'.date_indo($r->tgl_event) .'</td>
                <td width="12%" align="center">Rp. '.rp($r->deposit) .'</td>
                <td width="10%" align="center">'.sts_booking($r->status) .'</td>
            </tr>';
    }
$isi .='
       
    </table>';
$isi .='
<p></p>
<table width="100%" border="0" cellpadding="2" cellspacing="0">
    <tr align="center">
        <td width="70%">
           
        </td>
        <td width="30%">
            Serang, '.date_indo(date("Y-m-d")).'
            <p></p>
            <p></p>
            <p>.......................................</p>
        </td>
    </tr>
</table>';
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
    }

    // Page footer
    public function Footer() {
    }
}

// create new PDF document
$pdf = new MYPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('LAPORAN_BOOKING_ROOM');
$pdf->SetSubject('TCPDF');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_RIGHT, 11, PDF_MARGIN_RIGHT);

$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


//set auto page breaks
// $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->SetAutoPageBreak(TRUE, 6);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
//$pdf->setLanguageArray($l);

// --------------------Blok Text-------------------------------//
// set font
$pdf->SetFont('times', '', 9);



//============================block kode meminta scrip php hasil===========================================/
// add a page
$pdf->AddPage();
$pdf->writeHTML($isi, true, false, true, false, '');
// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('LAPORAN_BOOKING_ROOM.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+ 
?>      