<?php
   include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'user_request.php';
	}
    if(isset($_GET['q'])){
        $ID=$_GET['q'];
        $sql="DELETE FROM tbl_appointment WHERE AID='$ID'";
        if($conn ->query($sql)){
            $_SESSION['success'] ="Record has been successfully deleted";
        }else{
            $_SESSION['error'] ="No record deleted!";
        }


    }else{
        $_SESSION['error'] ="Please select first the record to delete";
    }
    header('location:'.$return);
?>