<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'gallery.php?home=gallery';
	}

	if(isset($_POST['submit'])){
		$GALLERY_ABOUT=$conn->real_escape_string($_POST['GALLERY_ABOUT']);
		$sql="UPDATE tbl_gallery SET GALLERY_ABOUT=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('s',$GALLERY_ABOUT);
		if($stmt->execute()){
			$_SESSION['success'] = 'Gallery description updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select recird to edit first';
	}

	header('location:'.$return);
?>