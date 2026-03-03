<?php
// tableData/table_receipt_pdf.php

require_once('../tcpdf/tcpdf.php');

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "resort_management";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ===== GET ID =====
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    die("Invalid receipt request.");
}

// ===== FETCH RECORD =====
$stmt = $conn->prepare("SELECT * FROM table_appointment WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if (!$result || $result->num_rows == 0) {
    die("Booking not found.");
}

$row = $result->fetch_assoc();

// ===== STATUS LABEL (COLORED) =====
// UPDATED MAPPING:
// 1 = Pending
// 2 = Rejected
// 3 = Approved
// 4 = Completed
function statusHtml($s) {
    $s = (int)$s;
    if ($s === 1) return '<span style="color:orange;"><b>Pending</b></span>';
    if ($s === 2) return '<span style="color:red;"><b>Rejected</b></span>';
    if ($s === 3) return '<span style="color:green;"><b>Approved</b></span>';
    if ($s === 4) return '<span style="color:blue;"><b>Completed</b></span>';
    return '<span style="color:#444;"><b>Unknown</b></span>';
}

// ===== FORMAT DATES =====
$bookingDate = date('l, F d, Y', strtotime($row['booking_date']));
$bookingTime = date('h:i A', strtotime($row['booking_time']));
$createdAt   = date('F d, Y h:i A', strtotime($row['created_at']));

// ===== SAFE OUTPUT =====
$name      = htmlspecialchars($row['name'] ?? '');
$email     = htmlspecialchars($row['email'] ?? '');
$contact   = htmlspecialchars($row['contact_number'] ?? '');
$numPeople = (int)($row['number_of_people'] ?? 0);
$price     = number_format((float)($row['price'] ?? 0), 2);
$gcashRef  = htmlspecialchars((string)($row['gcashref_number'] ?? ''));

// ===== TCPDF CUSTOM CLASS (FOOTER) =====
class MYPDF extends TCPDF {
    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'This is a system generated receipt.', 0, 0, 'C');
    }
}

$pdf = new MYPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Resort');
$pdf->SetTitle('Table Booking Receipt #' . $row['id']);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(true);
$pdf->SetMargins(15, 12, 15);
$pdf->SetAutoPageBreak(true, 15);
$pdf->SetFont('dejavusans', '', 11);
$pdf->AddPage();

//
// PATHS (dist is outside tableData)
//
$watermarkPath = realpath(__DIR__ . '/../dist/img/sprrlogo.png');
$logoPath      = realpath(__DIR__ . '/../dist/img/Logo.png');

// ===== WATERMARK =====
if ($watermarkPath && file_exists($watermarkPath)) {
    $pdf->SetAlpha(0.10);
    $pdf->Image($watermarkPath, 25, 40, 150, 0, '', '', '', false, 300);
    $pdf->SetAlpha(1);
}

// ===== LOGO SETTINGS =====
$logoWidth = 30;
$logoY     = 5;

// ===== LOGO (CENTERED) =====
if ($logoPath && file_exists($logoPath)) {
    $centerX = ($pdf->getPageWidth() - $logoWidth) / 2;
    $pdf->Image($logoPath, $centerX, $logoY, $logoWidth);
}

// ✅ PUSH THE RECEIPT CONTENT DOWN HERE
$pdf->SetY(40); // adjust if needed

// ===== CONTENT =====
$contents = '
<h1 align="center">TABLE BOOKING RECEIPT</h1>
<hr><br>

<table cellspacing="5" width="100%" border="0">
  <tr>
    <td width="35%"><b>STATUS:</b></td>
    <td width="65%">' . statusHtml($row["app_status"]) . '</td>
  </tr>
  <tr>
    <td><b>RECEIPT NO:</b></td>
    <td>' . (int)$row["id"] . '</td>
  </tr>
  <tr>
    <td><b>CREATED AT:</b></td>
    <td>' . $createdAt . '</td>
  </tr>
</table>

<hr><br>

<h3>Customer Details</h3>
<table cellspacing="5" width="100%" border="0">
  <tr>
    <td width="35%"><b>NAME:</b></td>
    <td width="65%">' . $name . '</td>
  </tr>
  <tr>
    <td><b>EMAIL:</b></td>
    <td>' . $email . '</td>
  </tr>
  <tr>
    <td><b>CONTACT NUMBER:</b></td>
    <td>' . $contact . '</td>
  </tr>
</table>

<hr><br>

<h3>Booking Details</h3>
<table cellspacing="5" width="100%" border="0">
  <tr>
    <td width="35%"><b>DATE:</b></td>
    <td width="65%">' . $bookingDate . '</td>
  </tr>
  <tr>
    <td><b>TIME:</b></td>
    <td>' . $bookingTime . '</td>
  </tr>
  <tr>
    <td><b>NUMBER OF PEOPLE:</b></td>
    <td>' . $numPeople . '</td>
  </tr>
  <tr>
    <td><b>PRICE:</b></td>
    <td>₱ ' . $price . '</td>
  </tr>
  <tr>
    <td><b>GCASH REF #:</b></td>
    <td>' . ($gcashRef !== '' ? $gcashRef : 'N/A') . '</td>
  </tr>
</table>
';

$pdf->writeHTML($contents, true, false, true, false, '');

// ===== BARCODE =====
$pdf->Ln(5);

$barcodeValue = 'TB-' . (int)$row['id'];
$barcodeWidth = 120;
$centerX = ($pdf->getPageWidth() - $barcodeWidth) / 2;

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
    $barcodeValue,
    'C128',
    $centerX,
    $pdf->GetY(),
    $barcodeWidth,
    18,
    0.4,
    $style,
    'N'
);

ob_end_clean();
$pdf->Output('Table_Booking_Receipt_' . (int)$row['id'] . '.pdf', 'I');
exit;
?>