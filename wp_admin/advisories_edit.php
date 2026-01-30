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
		$NEWSNAME =$conn -> real_escape_string($_POST['NEWSNAME']);
		$NEWSDESCRIPTION = $conn -> real_escape_string($_POST["NEWSDESCRIPTION"]);
		$sql= "UPDATE tbl_advisories SET NEWSNAME='$NEWSNAME', NEWSDESCRIPTION='$NEWSDESCRIPTION' WHERE NEWSID='$NEWSID'";
		if($conn->query($sql)){
		  $_SESSION['success']='Successfully updated';
		}else{
		  $_SESSION['error']='Opps! we have error while saving your data';
		}
			   
	}else{
		$_SESSION['error'] = 'Select recird to edit first';
	}
	
	header('location:'.$return);
?>