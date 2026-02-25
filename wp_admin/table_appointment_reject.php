<?php
include 'includes/session.php';

if(isset($_POST['submit'])){

    $stats = 2; // Rejected

    $stmt = $conn->prepare("UPDATE table_appointment SET app_status=? WHERE id=?");
    $stmt->bind_param('ii', $stats, $_POST['APP_ID']);

    if($stmt->execute()){
        $_SESSION['success'] = "Successfully Updated!";
    } else {
        $_SESSION['error'] = $conn->error;
    }

} else {
    $_SESSION['error'] = 'Opps!! Something went wrong!!';
}

header('location: table_appointment_pending.php?home=appointment_pending');
exit();
?>