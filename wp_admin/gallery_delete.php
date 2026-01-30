<?php
    include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'gallery.php?home=gallery';
	}

    if(isset($_POST['submit'])){

        $sql="DELETE FROM tbl_gallery WHERE GALLERY_ID=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param('s',$_POST['GALLERY_ID']);
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