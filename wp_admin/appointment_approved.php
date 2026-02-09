<?php
	include 'includes/session.php';
	include 'email/mailer.php';

	if(isset($_POST['submit'])){
    $APP_ID = $conn->real_escape_string($_POST['APP_ID']);
    $APP_STATUS = 1;
    $DATE_ACTION = date('Y-m-d');

    // Update appointment status
    $stmt = $conn->prepare("UPDATE tbl_appointment SET APP_STATUS=?, DATE_ACTION=? WHERE APP_ID=?");
    $stmt->bind_param('sss', $APP_STATUS, $DATE_ACTION, $APP_ID);

    if($stmt->execute()){
        // Database updated successfully

        // Fetch client info
        $stmt2 = $conn->prepare("SELECT FIRSTNAME, LASTNAME, EMAIL, BOOK_DATE FROM tbl_appointment WHERE APP_ID=?");
        $stmt2->bind_param('s', $APP_ID);
        $stmt2->execute();
        $result = $stmt2->get_result();
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $clientEmail = $row['EMAIL'];
            $clientName = $row['FIRSTNAME'].' '.$row['LASTNAME'];
            $bookDate = $row['BOOK_DATE'];
        }

        // Send email
        $subject = "Your Appointment is Approved";
        $body = "Hello $clientName,<br><br>
                 Your appointment on $bookDate has been <b>approved</b>.<br>
                 Reference number: $APP_ID<br><br>
                 Thank you!";

        $sent = sendEmail($clientEmail, $subject, $body);

        if($sent){
            $_SESSION['success'] = "Successfully Updated! Appointment approved and email sent.";
        } else {
            $_SESSION['success'] = "Successfully Updated! But email failed to send.";
        }

    } else {
        $_SESSION['error'] = $conn->error;
    }

} else {
    $_SESSION['error'] = 'Oops!! Something went wrong!!';
}

// Redirect back
header('location:appointment_pending.php?home=appointment_pending');
exit();

?>