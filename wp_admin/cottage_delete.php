<?php
    include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'cottage.php?home=cottage';
	}

    if(isset($_POST['submit'])){
        $COT_ID=$_POST['COT_ID'];
        $sql="DELETE FROM tbl_cottage WHERE COT_ID='$COT_ID'";
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