next
<?php
	include 'includes/session.php';

	if(isset($_POST['submit'])){
		$stats=3;
		$DATE_ACTION=date('Y-m-d');
		$stmt=$conn->prepare("UPDATE tbl_appointment SET APP_STATUS=?, DATE_ACTION=?, REMARKS=? WHERE APP_ID=?");
		$stmt->bind_param('ssss',$stats,$DATE_ACTION,$_POST['REMARKS'],$_POST['APP_ID']);
		if($stmt->execute()){
            $_SESSION['success'] ="Successfully Updated!";

        }else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Opps!! somthing went wrong!!';
	}
header('location: appointment_pending.php?home=appointment_pending');
?>