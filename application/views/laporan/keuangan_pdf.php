<?php
function no_transakis($id,$tgl_booking)   {
    $ex = explode("-",$tgl_booking);
    $date = $ex[0].$ex[1].$ex[2];
    $kodemax = str_pad($id, 4, "0", STR_PAD_LEFT);
    $kodejadi = "B".$date.$kodemax;
    return $kodejadi;  
}
$isi='
    <p>
    <h3 align="center">LAPORAN KEUANGAN<br>TERAS MEETING ROOM</H3>
    <b>Periode : '.date_indo($tgl_awal).' - '.date_indo($tgl_akhir).'</b>
    </p>
    <table width="100%" border="1" cellpadding="2" cellspacing="0">
        <thead>
            <tr align="center">
                <th width="3%"><b>NO</b></th>
                <th width="10%"><b>NO TRANSAKSI</b></th>
                <th width="15%"><b>BALLROOM</b></th>
                <th width="15%"><b>TGL EVENT</b></th>
                <th width="15%"><b>HARGA</b></th>
                <th width="12%"><b>DEPOSIT</b></th>
                <th width="15%"><b>BIAYA LAINNYA</b></th>
                <th width="15%"><b>TOTAL</b></th>
            </tr>
        </thead>';
    foreach ($result as $r){
        $s = $this->db->query("select sum(harga) as add_biaya from booking_transaksi where id_booking='$r->id_booking' ")->row();
        $total = $r->harga + $r->deposit + $s->add_biaya;
    $isi .='<tr>
                <td width="3%" align="center">'.++$start.'</td>
                <td width="10%">'.no_transakis($r->id_booking,$r->tgl_booking) .'</td>
                <td width="15%">'.$r->nama_ballroom .'</td>
                <td width="15%" align="center">'.date_indo($r->tgl_event) .'</td>
                <td width="15%" align="center">Rp. '.rp($r->harga) .'</td>
                <td width="12%" align="center">Rp. '.rp($r->deposit) .'</td>
                <td width="15%" align="center">Rp. '.rp($s->add_biaya) .'</td>
                <td width="15%" align="center">Rp. '.rp($total) .'</td>
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
$pdf->SetTitle('LAPORAN_KEUANGAN');
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
$pdf->Output('LAPORAN_KEUANGAN.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+ 
?>      