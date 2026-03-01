<?php
include "wp_admin/includes/conn.php";

$AUTO_NUMBER = $conn->real_escape_string(strtoupper($_GET['AUTO_NUMBER'] ?? ''));

$stmt = $conn->prepare("SELECT * FROM tbl_appointment WHERE AUTO_NUMBER=?");
$stmt->bind_param('s', $AUTO_NUMBER);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows <= 0) {
    die("No record found.");
}

$value = $result->fetch_assoc();

$NAME            = $value['LASTNAME'] . ', ' . $value['FIRSTNAME'] . ' ' . $value['MIDDLENAME'];
$BOOK_DATE       = $value['BOOK_DATE'];
$BOOK_TIME       = $value['BOOK_TIME'];
$MOBILE          = $value['MOBILE'];
$ADDRESS         = $value['ADDRESS'];
$VALID_ID_NUMBER = $value['VALID_ID_NUMBER'];

$DOWN_PAYMENT    = $value['DOWN_PAYMENT'];
$BALANCE         = $value['BALANCE'];
$PAYMENT_REF_NO  = $value['PAYMENT_REF_NO'];
$PAYMENT_STATUS  = $value['PAYMENT_STATUS'];

if ($value['APP_STATUS'] == 0) {
    $STATUS = '<span style="color:orange;">Pending</span>';
} elseif ($value['APP_STATUS'] == 1) {
    $STATUS = '<span style="color:green;">Approved</span>';
} elseif ($value['APP_STATUS'] == 2) {
    $STATUS = '<span style="color:blue;">Completed</span>';
} else {
    $STATUS = '<span style="color:red;">Rejected</span>';
}

$stmt2 = $conn->prepare("SELECT * FROM tbl_cottage WHERE COT_ID=?");
$stmt2->bind_param('s', $value['COT_ID']);
$stmt2->execute();
$cottage_query = $stmt2->get_result();
$cot_rows = $cottage_query->fetch_assoc();

$COT_NUMBER    = $cot_rows['COT_NUMBER'];
$COT_NAME      = $cot_rows['COT_NAME'];
$COT_PRICE     = $cot_rows['COT_PRICE'];
$COT_INCLUSION = $cot_rows['COT_INCLUSION'];

require_once('tcpdf/tcpdf.php');

class MYPDF extends TCPDF {

    public function Header() {
        $this->SetAutoPageBreak(false, 0);

        $logoPath = __DIR__ . '/dist/img/Logo.png';
        if (file_exists($logoPath)) {
            $this->Image($logoPath, 25, 50, 160);
        }

        $this->SetAutoPageBreak(true, 10);
        $this->setPageMark();
    }

    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
    }
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('REFERENCE: ' . $AUTO_NUMBER);
$pdf->SetMargins(15, 10, 15);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(true);
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('dejavusans', '', 11);
$pdf->AddPage();


// WATERMARK
$watermarkPath = __DIR__ . '/dist/img/sprrlogo.png';
if (file_exists($watermarkPath)) {
    $pdf->SetAlpha(0.1);
    $pdf->Image($watermarkPath, 25, 40, 150);
    $pdf->SetAlpha(1);
}


// START CONTENT
$pdf->SetY(20);

$logoHtmlPath = __DIR__ . '/dist/img/sprrlogo.png';

$contents = '
<table width="100%" border="0" cellpadding="2">
  <tr>
    <td align="center">
      <img src="' . $logoHtmlPath . '" width="100" />
    </td>
  </tr>
</table>

<h1 align="center">RESERVATION RECEIPT</h1>
<hr><br><br>

<table cellspacing="5" width="100%" border="0">
  <tr><td width="35%"><b>STATUS:</b></td><td>' . $STATUS . '</td></tr>
  <tr><td><b>REFERENCE NO:</b></td><td>' . $AUTO_NUMBER . '</td></tr>
  <tr><td><b>CLIENT NAME:</b></td><td>' . $NAME . '</td></tr>
  <tr><td><b>CONTACT:</b></td><td>' . $MOBILE . '</td></tr>
  <tr><td><b>ADDRESS:</b></td><td>' . $ADDRESS . '</td></tr>
  <tr><td><b>DATE RESERVED:</b></td><td>' . date('l F d, Y', strtotime($BOOK_DATE)) . ' ' . $BOOK_TIME . '</td></tr>
  <tr><td><b>VALID ID:</b></td><td>' . $VALID_ID_NUMBER . '</td></tr>
</table>

<hr><br>

<table cellspacing="5" width="100%" border="0">
  <tr><td width="35%"><b>NO:</b></td><td>' . $COT_NUMBER . '</td></tr>
  <tr><td><b>COTTAGE:</b></td><td>' . $COT_NAME . '</td></tr>
  <tr><td><b>PRICE:</b></td><td>₱ ' . number_format($COT_PRICE,2) . '</td></tr>
  <tr><td><b>INCLUSION:</b></td><td>' . $COT_INCLUSION . '</td></tr>
  <tr><td><b>DOWN PAYMENT:</b></td><td>₱ ' . number_format($DOWN_PAYMENT,2) . '</td></tr>
  <tr><td><b>BALANCE:</b></td><td>₱ ' . number_format($BALANCE,2) . '</td></tr>
  <tr><td><b>PAYMENT REFERENCE NO:</b></td><td>' . $PAYMENT_REF_NO . '</td></tr>
  <tr><td><b>PAYMENT STATUS:</b></td><td>' . $PAYMENT_STATUS . '</td></tr>
</table>
';

$pdf->writeHTML($contents, true, false, true, false, '');


// ================= BARCODE NEAR PAYMENT STATUS =================
$pdf->Ln(10);

$barcodeWidth = 120;
$centerX = ($pdf->getPageWidth() - $barcodeWidth) / 5;

$style = array(
    'align' => 'C',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
);

$pdf->write1DBarcode(
    $AUTO_NUMBER,
    'C128',
    $centerX,
    $pdf->GetY(),
    $barcodeWidth,
    18,
    0.4,
    $style,
    'N'
);
// ================================================================

ob_end_clean();
$pdf->Output('Reservation Receipt.pdf', 'I');
?>