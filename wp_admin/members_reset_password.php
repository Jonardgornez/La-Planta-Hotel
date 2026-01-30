<?php
	include 'includes/session.php';
	if(isset($_GET['resetpass'])){
		$sql=$conn->prepare("UPDATE tbl_users SET PASSWORD='HCPM-".round(microtime(true))."' WHERE ID=?");
		$sql->bind_param('s',$_GET['resetpass']);
		if($sql->execute()){
			$_SESSION['success'] = 'Successfully reset!';
			
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Opps!! somthing went wrong!!';
	}
header('location: members.php');
?>

