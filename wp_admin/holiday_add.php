<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'holiday.php?home=holiday';
	}

	if(isset($_POST['submit'])){			
		$blocked_date=$_POST['blocked_date'];
		$blocked_name=$conn -> real_escape_string($_POST['blocked_name']);

		$stmt=$conn->prepare("INSERT INTO tbl_blocked_days (blocked_date, blocked_name)VALUES(?,?)");
		$stmt->bind_param('ss',$blocked_date,$blocked_name);
		if($stmt->execute()){
			$_SESSION['success'] = 'New holiday have been created.';
		}else{
			$_SESSION['error'] = $conn->error;
		}

	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
		
	}
	//header('location: clientAccount.php?q='.$_POST['id']);
	header('location:'.$return);
?>