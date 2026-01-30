<?php
    include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'contact_us.php?home=contact_us';
	}

    if(isset($_POST['submit'])){
        $stmt=$conn->prepare("DELETE FROM tbl_contact_us WHERE C_ID=?");
        $stmt->bind_param('s',$_POST['C_ID']);
        if($stmt ->execute()){
            $_SESSION['success'] ="Record has been successfully deleted";
        }else{
            $_SESSION['error'] ="No record deleted!";
        }
    }else{
        $_SESSION['error'] ="Please select first the record to delete";
    }
    header('location:'.$return);
?>