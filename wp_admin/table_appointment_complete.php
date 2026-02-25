<?php
include 'includes/session.php';

if(isset($_POST['submit'])){

    $stats = 4; // 2 = Completed
    $id = $_POST['id'];

    $stmt = $conn->prepare("UPDATE table_appointment SET app_status=? WHERE id=?");
    $stmt->bind_param('ii', $stats, $id);

    if($stmt->execute()){
        $_SESSION['success'] = "Successfully marked as completed!";
    } else {
        $_SESSION['error'] = "No record marked as completed!";
    }

    $stmt->close();
}
else{
    $_SESSION['error'] = 'Oops!! Something went wrong!!';
}

header('location: table_appointment.php?home=appointment_approved');
?>