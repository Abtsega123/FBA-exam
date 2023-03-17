<?php 
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
    
    public function Header() {
        $image_file = K_PATH_IMAGES.'logo_example.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->SetFont('helvetica', 'B', 18);
        $this->SetY(13);
        $this->Cell(0, 15, 'Examination Result', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Examination Results');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

// create some HTML content
$html = <<<EOD
<p>
Online Examination System in PHP using CodeIgniter Framework. </br>
All the detailed information are provided below!
</p>
<h2>Student Data</h2>
<table id="data-peserta">
    <tr>
        <th>NIM</th>
        <td>{$mhs->nim}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{$mhs->nama}</td>
    </tr>
    <tr>
        <th>Class</th>
        <td>{$mhs->nama_kelas}</td>
    </tr>
    <tr>
        <th>Department</th>
        <td>{$mhs->nama_jurusan}</td>
    </tr>
</table>
<h2>Exam Data</h2>
<table id="data-hasil">
    <tr>
        <th>Course</th>
        <td>{$ujian->nama_matkul}</td>
    </tr>
    <tr>
        <th>Exam Name</th>
        <td>{$ujian->nama_ujian}</td>
    </tr>
    <tr>
        <th>Total Questions</th>
        <td>{$ujian->jumlah_soal}</td>
    </tr>
</table>
<h2>Exam Results</h2>
<table>
    <tr>
        <th>Correct Answer</th>
        <td>{$hasil->jml_benar}</td>
    </tr>
    <tr>
        <th>Obtained Score</th>
        <td>{$hasil->nilai}</td>
    </tr>
</table>
EOD;
// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);
// reset pointer to the last page
$pdf->lastPage();
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($ujian->nama_ujian.'_'.$mhs->nim.'.pdf', 'I');
