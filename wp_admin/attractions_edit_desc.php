<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'attractions.php?home=attractions';
	}

	if(isset($_POST['submit'])){
		$ATTRACT_ABOUT=$conn->real_escape_string($_POST['ATTRACT_ABOUT']);
		$sql="UPDATE tbl_attractions SET ATTRACT_ABOUT=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('s',$ATTRACT_ABOUT);
		if($stmt->execute()){
			$_SESSION['success'] = 'Attractions description updated successfully';
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