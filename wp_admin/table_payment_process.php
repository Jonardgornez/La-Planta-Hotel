<?php
include 'includes/session.php';

$return = isset($_GET['return'])
    ? $_GET['return']
    : 'table_appointment.php?home=appointment_approved';

if (!isset($_POST['submit'])) {
    $_SESSION['error'] = 'Fill up the form first.';
    header('location:' . $return);
    exit();
}

$id          = isset($_POST['APP_ID']) ? (int)$_POST['APP_ID'] : 0;
$PAY_PAYMENT = isset($_POST['PAY_PAYMENT']) ? (float)$_POST['PAY_PAYMENT'] : 0;
$PAY_REMARKS = isset($_POST['PAY_REMARKS']) ? trim($_POST['PAY_REMARKS']) : '';

if ($id <= 0) {
    $_SESSION['error'] = 'Invalid appointment ID.';
    header('location:' . $return);
    exit();
}

if ($PAY_PAYMENT <= 0) {
    $_SESSION['error'] = 'Payment must be greater than 0.';
    header('location:' . $return);
    exit();
}

/**
 * 1) Read current appointment (price + downpayment)
 */
$sql = "SELECT price, downpayment, remarks
        FROM table_appointment
        WHERE id = ?
        LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows === 0) {
    $_SESSION['error'] = 'Appointment not found.';
    $stmt->close();
    header('location:' . $return);
    exit();
}

$row = $res->fetch_assoc();
$stmt->close();

$price       = (float)$row['price'];
$currentDown = (float)$row['downpayment'];
$oldRemarks  = $row['remarks'] ?? '';

/**
 * 2) Compute new downpayment (server-side safe)
 */
$newDownpayment = $currentDown + $PAY_PAYMENT;

// prevent overpayment
if ($newDownpayment > $price) {
    $newDownpayment = $price;
}

/**
 * 3) Save remarks (append so you don't lose old notes)
 */
$finalRemarks = $PAY_REMARKS;
if (!empty($oldRemarks)) {
    $finalRemarks = $oldRemarks . "\n---\n" . $PAY_REMARKS;
}

/**
 * 4) Update table_appointment ONLY (NO app_status change)
 */
$update = "UPDATE table_appointment
           SET downpayment = ?,
               remarks = ?
           WHERE id = ?";
$ustmt = $conn->prepare($update);
$ustmt->bind_param("dsi", $newDownpayment, $finalRemarks, $id);

if ($ustmt->execute()) {
    $_SESSION['success'] = 'Payment saved! Downpayment updated.';
} else {
    $_SESSION['error'] = 'Error updating appointment: ' . $ustmt->error;
}

$ustmt->close();

header('location:' . $return);
exit();
?>