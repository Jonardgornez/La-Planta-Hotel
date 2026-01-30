<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'holiday.php';
	}

	if(isset($_POST['submit'])){

		$stmt=$conn->prepare("UPDATE `tbl_blocked_days` SET `blocked_date`=?,`blocked_name`=? WHERE id = ?");
		$stmt->bind_param('sss',$_POST['blocked_date'],$_POST['blocked_name'],$_POST['id']);
		if($stmt->execute()){
			$_SESSION['success'] = 'Holiday updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select recird to edit first';
	}

	header('location:'.$return);
?>