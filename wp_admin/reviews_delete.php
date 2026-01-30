<?php
    include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'reviews.php?home=reviews';
	}

    if(isset($_POST['submit'])){
        $stmt=$conn->prepare("DELETE FROM tbl_review WHERE review_id=?");
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