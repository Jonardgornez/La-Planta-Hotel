<?php
    include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'requirements.php?home=requirements';
	}

    if(isset($_POST['submit'])){

        $sql="DELETE FROM tbl_requirements WHERE REQ_ID=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param('s',$_POST['REQ_ID']);
        if($stmt->execute()){
            $_SESSION['success'] ="Requirements has been successfully deleted";
        }else{
            $_SESSION['error'] ="No record deleted!";
        }
    }else{
        $_SESSION['error'] ="Please select first the record to delete";
    }
    header('location:'.$return);
?>