<?php
include 'includes/session.php';
include 'email/mailer.php';

if(isset($_POST['submit'])){

    $APP_ID = intval($_POST['APP_ID']); 
    $APP_STATUS = 3; // Approved

    // Update appointment status
    $stmt = $conn->prepare("UPDATE table_appointment SET app_status=? WHERE id=?");
    $stmt->bind_param('ii', $APP_STATUS, $APP_ID);

    if($stmt->execute()){

        // Fetch client info including gcash reference number
        $stmt2 = $conn->prepare("SELECT name, email, booking_date, gcashref_number 
                                 FROM table_appointment 
                                 WHERE id=?");
        $stmt2->bind_param('i', $APP_ID);
        $stmt2->execute();
        $result = $stmt2->get_result();

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $clientEmail = $row['email'];
            $clientName  = $row['name'];
            $bookDate    = $row['booking_date'];
            $gcashRef    = $row['gcashref_number'];
        }

        // Email content
        $subject = "Your Appointment is Approved";
        $body = "Hello $clientName,<br><br>
                 Your Table appointment on <b>$bookDate</b> has been approved.<br>
                 GCash Reference Number: <b>$gcashRef</b><br><br>
                 Thank you for booking with us!";

        // Send email
        $sent = sendEmail($clientEmail, $subject, $body);

        if($sent){
            $_SESSION['success'] = "Successfully Updated! Appointment approved and email sent.";
        } else {
            $_SESSION['success'] = "Successfully Updated! But email failed to send.";
        }

    } else {
        $_SESSION['error'] = $stmt->error;
    }

} else {
    $_SESSION['error'] = 'Oops!! Something went wrong!!';
}

// Redirect back
header('location:table_appointment_pending.php?home=appointment_pending');
exit();
?>