<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'services.php?home=services';
	}

	if(isset($_POST['submit'])){
		$SERVICE_ABOUT=$conn->real_escape_string($_POST['SERVICE_ABOUT']);
		$sql="UPDATE tbl_services SET SERVICE_ABOUT=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('s',$SERVICE_ABOUT);
		if($stmt->execute()){
			$_SESSION['success'] = 'Service description updated successfully';
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