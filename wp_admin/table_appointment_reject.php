<?php
include 'includes/session.php';
include 'email/mailer.php';

if(isset($_POST['submit'])){

    $APP_ID = (int)$_POST['APP_ID'];
    $stats  = 2; // Rejected (based on your system)

    $DATE_ACTION = date('Y-m-d');

    // Update appointment status
    $stmt = $conn->prepare("UPDATE table_appointment SET app_status=? WHERE id=?");
    $stmt->bind_param('ii', $stats, $APP_ID);

    if($stmt->execute()){

        // Get client information
        $stmt2 = $conn->prepare("SELECT name, email, booking_date, booking_time 
                                 FROM table_appointment 
                                 WHERE id=?");
        $stmt2->bind_param('i', $APP_ID);
        $stmt2->execute();
        $result = $stmt2->get_result();

        if($result && $result->num_rows > 0){

            $row = $result->fetch_assoc();

            $clientName  = $row['name'];
            $clientEmail = $row['email'];
            $bookDate    = $row['booking_date'];
            $bookTime    = $row['booking_time'];
            $referenceNo = $APP_ID; // use ID as reference

        } else {
            $_SESSION['error'] = "Appointment not found.";
            header('location: table_appointment_pending.php?home=appointment_pending');
            exit();
        }

        // Email message
        $subject = "Your Table Reservation is Rejected";

        $body = "Hello $clientName,<br><br>
                 We’re sorry, your table reservation scheduled on 
                 <b>$bookDate</b> at <b>$bookTime</b> has been <b>rejected</b>.<br><br>
                 Reference number: <b>$referenceNo</b><br><br>
                 If you have questions, please contact us.<br><br>
                 Thank you!";

        $sent = sendEmail($clientEmail, $subject, $body);

        if($sent){
            $_SESSION['success'] = "Successfully Updated! Reservation rejected and email sent.";
        } else {
            $_SESSION['success'] = "Successfully Updated! But email failed to send.";
        }

    } else {
        $_SESSION['error'] = $stmt->error;
    }

} else {
    $_SESSION['error'] = 'Oops!! Something went wrong!!';
}

header('location: table_appointment_pending.php?home=appointment_pending');
exit();
?>