<?php
include "includes/header.php";

$appid = isset($_GET['appid']) ? (int)$_GET['appid'] : 0;

$stmt = $conn->prepare("
    SELECT id, name, price, gcashref_number, booking_date, downpayment
    FROM table_appointment
    WHERE id = ?
");
$stmt->bind_param("i", $appid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows <= 0) {
    die("No appointment found.");
}

$row = $result->fetch_assoc();
$stmt->close();

$price   = (float)$row['price'];
$payment = (float)$row['downpayment']; 
$balance = $price - $payment; 

$gcash   = !empty($row['gcashref_number']) ? $row['gcashref_number'] : '-';

/* Format the booking date */
$bookingDate = date("F j, Y", strtotime($row['booking_date']));
?>

<!DOCTYPE html>
<html>
<head>
<style>
body{
  border:1px solid black;
  padding:15px;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 11pt;
}

table{
  border-collapse: collapse;
  width: 100%;
}

th, td{
  border: 1px solid #000;
  padding: 8px;
}

.text-right{ text-align:right; }
.text-center{ text-align:center; }

#printPageButton{
  background: linear-gradient(135deg, #26de81, #20bf6b);
  color: #fff;
  border: none;
  padding: 8px 18px;
  font-size: 10pt;
  font-weight: bold;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s ease;
}

#printPageButton:hover{
  background: linear-gradient(135deg, #20bf6b, #0fb9b1);
  transform: scale(1.05);
}

#printPageButton:active{
  transform: scale(0.98);
}

@media print {
  #printPageButton { display: none; }
}
</style>
</head>

<body onload="print()">

<table>
<tr>
  <td><b>Client Name:</b> <?= htmlspecialchars($row['name']); ?></td>
  <td class="text-right">
    <button id="printPageButton" onclick="window.print();">🖨 Print Receipt</button>
  </td>
</tr>
<tr>
  <td><b>Booking Date:</b> <?= htmlspecialchars($bookingDate); ?></td>
  <td>&nbsp;</td>
</tr>
</table>

<br>

<table>
<thead>
<tr>
  <th>PRICE</th>
  <th>DOWNPAYMENT</th>
  <th>BALANCE</th>
  <th>GCASH REF. NO</th>
</tr>
</thead>
<tbody>
<tr>
  <td class="text-right"><?= number_format($price, 2); ?></td>
  <td class="text-right"><?= number_format($payment, 2); ?></td>
  <td class="text-right"><?= number_format($balance, 2); ?></td>
  <td class="text-center"><?= htmlspecialchars($gcash); ?></td>
</tr>
</tbody>
</table>

</body>
</html>