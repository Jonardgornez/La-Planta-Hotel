<?php
    include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'members.php?home=members';
	}

    if(isset($_POST['submit'])){

        $sql="DELETE FROM tbl_users WHERE ID=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param('s',$_POST['ID']);
        if($stmt->execute()){
            $_SESSION['success'] ="Member has been successfully deleted";
        }else{
            $_SESSION['error'] ="No record deleted!";
        }
    }else{
        $_SESSION['error'] ="Please select first the record to delete";
    }
    header('location:'.$return);
?>