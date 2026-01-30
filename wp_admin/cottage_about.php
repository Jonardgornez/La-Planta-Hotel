<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'cottage.php?home=cottage';
	}

	if(isset($_POST['submit'])){
		$COT_ABOUT=$conn->real_escape_string($_POST['COT_ABOUT']);
		$sql="UPDATE tbl_cottage SET COT_ABOUT=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('s',$COT_ABOUT);
		if($stmt->execute()){
			$_SESSION['success'] = 'Cottage description updated successfully';
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