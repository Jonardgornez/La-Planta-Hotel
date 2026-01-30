<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}else{
		$return = 'services.php?name=services';
	}

	if(isset($_POST['submit'])){			
		$SERVICE_FROM_DAY =$_POST['SERVICE_FROM_DAY'];
		$SERVICE_END_DAY =$_POST['SERVICE_END_DAY'];
		$SERVICE_DESC = $conn -> real_escape_string(strtoupper($_POST["SERVICE_DESC"]));
		$SERVICE_START = $_POST["SERVICE_START"];
		$SERVICE_END =$_POST["SERVICE_END"];
		
		$sql="INSERT INTO tbl_services(SERVICE_FROM_DAY,SERVICE_END_DAY,SERVICE_DESC,SERVICE_START,SERVICE_END) 
		VALUES ('$SERVICE_FROM_DAY','$SERVICE_END_DAY','$SERVICE_DESC','$SERVICE_START','$SERVICE_END')";
		if($conn->query($sql)){
			$_SESSION['success']='New services has been successfully added!';
		}else{
			$_SESSION['error']='Opps! we have error while saving your data';
		}
				
	}else{
		$_SESSION['error'] = 'Fill up add form first';
		
	}
	header('location:'.$return);
?>