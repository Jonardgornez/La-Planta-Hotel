<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'schedule.php';
	}

	if(isset($_POST['submit'])){
		$ID 			= $_POST['id'];
		$slots_date=$_POST['slots_date'];
		$slots=$_POST['slots'];
		$start_time=$_POST['start_time'];
		$end_time=$_POST['end_time'];
		$duration=$_POST['duration'];

		$sql="UPDATE tbl_slot_date
		SET slots_date='$slots_date', 
		slots='$slots', 
		start_time='$start_time', 
		end_time='$end_time', 
		duration='$duration'
		WHERE id = '$ID'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Schedule name updated successfully';
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