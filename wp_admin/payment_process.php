<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}else{
		$return = 'appointment_pending.php?home=appointment_pending';
	}

	if(isset($_POST['submit'])){			
		$PAY_APP_ID =$_POST['APP_ID'];
		$PAY_COT_ID =$_POST['PAY_COT_ID'];
		$PAY_PAYMENT =$_POST['PAY_PAYMENT'];
		$PAY_BALANCE =$_POST['PAY_BALANCE'];
		$PAY_DATE =date("Y-m-d");
		$PAY_REMARKS=$_POST['PAY_REMARKS'];

		$sql="INSERT INTO tbl_payment_history(PAY_APP_ID, PAY_COT_ID,PAY_PAYMENT,PAY_BALANCE,PAY_DATE,PAY_REMARKS) 
		VALUES ('$PAY_APP_ID','$PAY_COT_ID','$PAY_PAYMENT','$PAY_BALANCE','$PAY_DATE','$PAY_REMARKS')";
		if($conn->query($sql)){
			$_SESSION['success']='New payment has been successfully posted!';

			$query ="UPDATE tbl_appointment SET BALANCE='$PAY_BALANCE' WHERE APP_ID='$PAY_APP_ID'";
			$conn->query($query);

		}else{
			$_SESSION['error']='Opps! we have error while saving your data';
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
		
	}
	header('location:'.$return);
?>