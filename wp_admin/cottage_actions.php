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
        $COT_STATUS=$_POST['COT_STATUS'];
        $sql="UPDATE tbl_cottage SET COT_STATUS='$COT_STATUS' WHERE COT_ID='$COT_ID'";
        if($conn ->query($sql)){
            $_SESSION['success'] ="Data has been successfully updated";
        }else{
            $_SESSION['error'] ="No record update!";
        }
    }else{
        $_SESSION['error'] ="Please select first the record to delete";
    }
    header('location:'.$return);
?>