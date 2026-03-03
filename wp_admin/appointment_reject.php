<?php
include 'includes/session.php';
include 'email/mailer.php';

if (isset($_POST['submit'])) {

    $APP_ID      = $conn->real_escape_string($_POST['APP_ID']);
    $REMARKS     = $conn->real_escape_string($_POST['REMARKS']);
    $APP_STATUS  = 3; // Rejected
    $DATE_ACTION = date('Y-m-d');

    // Update appointment status to rejected
    $stmt = $conn->prepare("UPDATE tbl_appointment SET APP_STATUS=?, DATE_ACTION=?, REMARKS=? WHERE APP_ID=?");
    $stmt->bind_param('ssss', $APP_STATUS, $DATE_ACTION, $REMARKS, $APP_ID);

    if ($stmt->execute()) {

        // Fetch client info INCLUDING AUTO_NUMBER
        $stmt2 = $conn->prepare("SELECT FIRSTNAME, LASTNAME, EMAIL, BOOK_DATE, AUTO_NUMBER 
                                 FROM tbl_appointment 
                                 WHERE APP_ID=?");
        $stmt2->bind_param('s', $APP_ID);
        $stmt2->execute();
        $result = $stmt2->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $clientEmail      = $row['EMAIL'];
            $clientName       = $row['FIRSTNAME'] . ' ' . $row['LASTNAME'];
            $bookDate         = $row['BOOK_DATE'];
            $referenceNumber  = $row['AUTO_NUMBER']; // Reference number

        } else {
            $_SESSION['error'] = "Appointment not found.";
            header('location:appointment_pending.php?home=appointment_pending');
            exit();
        }

        // Send rejection email
        $subject = "Your Appointment is Rejected";
        $body = "Hello $clientName,<br><br>
                 We’re sorry, your appointment on <b>$bookDate</b> has been <b>rejected</b>.<br>
                 Reference number: <b>$referenceNumber</b><br><br>
                 Reason/Remarks: <b>$REMARKS</b><br><br>
                 Thank you!";

        $sent = sendEmail($clientEmail, $subject, $body);

        if ($sent) {
            $_SESSION['success'] = "Successfully Updated! Appointment rejected and email sent.";
        } else {
            $_SESSION['success'] = "Successfully Updated! But email failed to send.";
        }

    } else {
        $_SESSION['error'] = $stmt->error;
    }

} else {
    $_SESSION['error'] = 'Oops!! Something went wrong!!';
}

header('location:appointment_pending.php?home=appointment_pending');
exit();
?>