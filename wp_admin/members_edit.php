<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'members.php?home=members';
	}

	if(isset($_POST['submit'])){
		$FIRSTNAME=$_POST['FIRSTNAME'];
		$MI=$_POST['MI'];
		$LASTNAME=$_POST['LASTNAME'];
		$ROLE=$_POST['ROLE'];
		$USERNAME=$_POST['USERNAME'];
		$PASSWORD=$_POST['PASSWORD'];
		$PERMISSION_ADD     =$_POST['PERMISSION_ADD'];
		$PERMISSION_EDIT    =$_POST['PERMISSION_EDIT'];
		$PERMISSION_DELETE  =$_POST['PERMISSION_DELETE'];
		$PERMISSION_APPROVED =$_POST['PERMISSION_APPROVED'];
		$PERMISSION_REJECT   =$_POST['PERMISSION_REJECT'];
		$PERMISSION_COMPLETE =$_POST['PERMISSION_COMPLETE'];
		$PERMISSION_ALL     =$_POST['PERMISSION_ALL'];

		$sql="UPDATE tbl_users SET FIRSTNAME=?,MI=?,LASTNAME=?,ROLE=?,USERNAME=?,PASSWORD=?,PERMISSION_ADD=?, PERMISSION_EDIT=?,PERMISSION_DELETE=?,PERMISSION_APPROVED=?,PERMISSION_REJECT=?,PERMISSION_COMPLETE=?, PERMISSION_ALL=? WHERE ID = ?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('ssssssssssssss',$FIRSTNAME,$MI,$LASTNAME,$ROLE,$USERNAME,$PASSWORD,$PERMISSION_ADD,$PERMISSION_EDIT,$PERMISSION_DELETE,$PERMISSION_APPROVED,$PERMISSION_REJECT,$PERMISSION_COMPLETE,$PERMISSION_ALL,$_POST['ID']);
		if($stmt->execute()){
			$_SESSION['success'] = 'Members updated successfully';
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