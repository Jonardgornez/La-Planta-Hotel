<?php
session_start();
if (!isset($_SESSION['admin']) || trim($_SESSION['admin']) == '') {
    header("location:404.php?404");
    exit();
}

include "wp_admin/includes/conn.php";

$stmt = $conn->prepare("SELECT * FROM tbl_appointment WHERE APP_ID=?");
$stmt->bind_param('s', $_SESSION['admin']);
$stmt->execute();
$result = $stmt->get_result();

if (!$result || $result->num_rows <= 0) {
    header("location:404.php?404");
    exit();
}

$value = $result->fetch_assoc();

$APP_ID          = $value['APP_ID'];
$AUTO_NUMBER     = $value['AUTO_NUMBER'];
$NAME            = $value['LASTNAME'] . ', ' . $value['FIRSTNAME'] . ' ' . $value['MIDDLENAME'];
$BOOK_DATE       = $value['BOOK_DATE'];
$BOOK_TIME       = $value['BOOK_TIME'];
$APP_STATUS      = $value['APP_STATUS'];
$DATE_ACTION     = $value['DATE_ACTION'];
$MOBILE          = $value['MOBILE'];
$ADDRESS         = $value['ADDRESS'];
$VALID_ID_NUMBER = $value['VALID_ID_NUMBER'];

if ($APP_STATUS == 0) {
    $STATUS = '<span style="color:orange;"><b>Pending</b></span>';
} elseif ($APP_STATUS == 1) {
    $STATUS = '<span style="color:green;"><b>Approved</b></span>';
} elseif ($APP_STATUS == 2) {
    $STATUS = '<span style="color:blue;"><b>Completed</b></span>';
} elseif ($APP_STATUS == 3) {
    $STATUS = '<span style="color:red;"><b>Rejected</b></span>';
} else {
    $STATUS = '<span><b>Unknown</b></span>';
}

// Fetch cottage info
$stmt2 = $conn->prepare("SELECT * FROM tbl_cottage WHERE COT_ID=?");
$stmt2->bind_param('s', $value['COT_ID']);
$stmt2->execute();
$cottage_query = $stmt2->get_result();

$COT_NUMBER = $COT_NAME = $COT_PRICE = $COT_INCLUSION = '';
if ($cottage_query && $cottage_query->num_rows > 0) {
    $cot_rows = $cottage_query->fetch_assoc();
    $COT_NUMBER    = $cot_rows['COT_NUMBER'];
    $COT_NAME      = $cot_rows['COT_NAME'];
    $COT_PRICE     = $cot_rows['COT_PRICE'];
    $COT_INCLUSION = $cot_rows['COT_INCLUSION'];
}

require_once('tcpdf/tcpdf.php');

// Custom PDF class
class MYPDF extends TCPDF {
    public function Header() {
        // If you want a header image, use $this->Image (NOT $pdf)
        // But since setPrintHeader(FALSE) is used below, header won't show anyway.
    }

    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        // optional footer text:
        // $this->Cell(0, 10, 'Generated on '.date('F d, Y'), 0, 0, 'C');
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('REFERENCE: ' . $AUTO_NUMBER);

$pdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(true);

$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('helvetica', '', 11);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->AddPage();

// Watermark logo (optional)
$pdf->SetAlpha(0.08);
if (file_exists('dist/img/Logo.png')) {
    $img_file = file_get_contents('dist/img/Logo.png');
    $pdf->Image('@' . $img_file, 25, 40, 150, '', '', '', '', false, 50, 'C', false);
}
$pdf->SetAlpha(1);

// Barcode
$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'bgcolor' => false,
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);
$pdf->write1DBarcode($AUTO_NUMBER, 'C128', 15, 150, '', 15, 0.4, $style, 'N');

$pdf->SetY(15);

// ✅ FIXED HTML (tables are valid now: table -> tr -> td)
$contents = '
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td align="center" style="font-size:18px;"><b>RESERVATION RECEIPT</b></td>
  </tr>
</table>

<hr>

<br>

<table cellspacing="5" width="100%" border="0">
  <tr>
    <td width="30%"><b>STATUS:</b></td>
    <td width="70%">'.$STATUS.'</td>
  </tr>
  <tr>
    <td><b>REFERENCE NO:</b></td>
    <td>'.$AUTO_NUMBER.'</td>
  </tr>
  <tr>
    <td><b>CLIENT NAME:</b></td>
    <td>'.$NAME.'</td>
  </tr>
  <tr>
    <td><b>CONTACT:</b></td>
    <td>'.$MOBILE.'</td>
  </tr>
  <tr>
    <td><b>ADDRESS:</b></td>
    <td>'.$ADDRESS.'</td>
  </tr>
  <tr>
    <td><b>DATE RESERVED:</b></td>
    <td>'.date('l F d, Y', strtotime($BOOK_DATE)).' '.$BOOK_TIME.'</td>
  </tr>
  <tr>
    <td><b>VALID ID:</b></td>
    <td>'.$VALID_ID_NUMBER.'</td>
  </tr>
</table>

<hr>

<table cellspacing="5" width="100%" border="0">
  <tr>
    <td width="30%"><b>COTTAGE NO:</b></td>
    <td width="70%">'.$COT_NUMBER.'</td>
  </tr>
  <tr>
    <td><b>COTTAGE NAME:</b></td>
    <td>'.$COT_NAME.'</td>
  </tr>
  <tr>
    <td><b>COTTAGE PRICE:</b></td>
    <td>'.$COT_PRICE.'</td>
  </tr>
  <tr>
    <td><b>COTTAGE INCLUSION:</b></td>
    <td>'.$COT_INCLUSION.'</td>
  </tr>
</table>
';

$pdf->writeHTML($contents, true, false, true, false, '');

// Avoid "ob_end_clean()" error if no output buffering started
if (ob_get_length()) {
    ob_end_clean();
}

$pdf->Output('Reservation Receipt.pdf', 'I');
exit();
?>