<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}else{
		$return = 'advisories.php?home=advisories';
	}

	if(isset($_POST['submit'])){			
		$NEWSNAME =$_POST['NEWSNAME'];
		$NEWSDESCRIPTION = $conn -> real_escape_string($_POST["NEWSDESCRIPTION"]);
		
		$sql="INSERT INTO `tbl_advisories`(`NEWSNAME`, `NEWSDESCRIPTION`,`USERID`) 
		VALUES ('$NEWSNAME','$NEWSDESCRIPTION','".$_SESSION['admin']."')";
		if($conn->query($sql)){
			$_SESSION['success']='New advisory has been successfully posted!';
		}else{
			$_SESSION['error']='Opps! we have error while saving your data';
		}

	}else{
		$_SESSION['error'] = 'Fill up add form first';
		
	}
	header('location:'.$return);
?>