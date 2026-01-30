<?php
	include 'includes/session.php';

	if(isset($_POST['submit'])){
		$APP_ID =$conn->real_escape_string($_POST['APP_ID']);
		$APP_STATUS=1;
		$DATE_ACTION=date('Y-m-d');
		$SESSION=$_SESSION['admin'];
		$stmt="UPDATE tbl_appointment SET APP_STATUS=?, DATE_ACTION=? WHERE APP_ID=?";
		$stmt=$conn->prepare($stmt);
		$stmt->bind_param('sss',$APP_STATUS,$DATE_ACTION,$APP_ID);
		if($stmt->execute()){
            $_SESSION['success'] ="Successfully Updated!";
        }else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Opps!! somthing went wrong!!';
	}
header('location:appointment_pending.php?home=appointment_pending');
?>