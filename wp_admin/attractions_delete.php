<?php
    include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'attractions.php?home=attractions';
	}

    if(isset($_POST['submit'])){

        $sql="DELETE FROM tbl_attractions WHERE ATTRACT_ID=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param('s',$_POST['ATTRACT_ID']);
        if($stmt->execute()){
            $_SESSION['success'] ="Photos has been successfully deleted";
        }else{
            $_SESSION['error'] ="No record deleted!";
        }
    }else{
        $_SESSION['error'] ="Please select first the record to delete";
    }
    header('location:'.$return);
?>