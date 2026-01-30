<?php
    include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'holiday.php?holiday=holiday';
	}

    if(isset($_POST['submit'])){
        $stmt=$conn->prepare("DELETE FROM tbl_blocked_days WHERE id=?");
        $stmt->bind_param('s',$_POST['del_holid']);
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