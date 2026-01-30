<?php
	include 'includes/session.php';

	if(isset($_POST['submit'])){
		$stats=2;
		$DATE_COMPLETED=date('Y-m-d');
		$REMARKS=$conn->real_escape_string($_POST['REMARKS']);
		$stmt=$conn->prepare("UPDATE tbl_appointment SET APP_STATUS=?, DATE_COMPLETED=?, REMARKS=? WHERE APP_ID=?");
		$stmt->bind_param('ssss',$stats,$DATE_COMPLETED,$REMARKS,$_POST['APP_ID']);

		if($stmt->execute()){
            $_SESSION['success'] ="Successfully Updated!";

        }else{
            $_SESSION['error'] ="No record to marked as completed!";
        }
	}
	else{
		$_SESSION['error'] = 'Opps!! somthing went wrong!!';
	}
header('location: appointment.php?home=appointment_approved');
?>