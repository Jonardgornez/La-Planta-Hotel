<?php
    include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'advisories.php?home=advisories';
	}

    if(isset($_POST['submit'])){
        $NEWSID=$_POST['NEWSID'];
        $sql="DELETE FROM tbl_advisories WHERE NEWSID='$NEWSID'";
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