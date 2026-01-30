<?php
	include 'includes/session.php';
    if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}else{
		$return = 'members.php?home=members';
	}

	if(isset($_POST['submit'])){			
		$FIRSTNAME    =$conn->real_escape_string(strtoupper($_POST['FIRSTNAME']));
		$MI           =$conn->real_escape_string(strtoupper($_POST['MI']));
		$LASTNAME     =$conn->real_escape_string(strtoupper($_POST['LASTNAME']));
		$ROLE         =$conn->real_escape_string(strtoupper($_POST['ROLE']));
   	 	$USERNAME     =$_POST['USERNAME'];
    	$PASSWORD     =$_POST['PASSWORD'];
		$PERMISSION_ADD     =$_POST['PERMISSION_ADD'];
		$PERMISSION_EDIT    =$_POST['PERMISSION_EDIT'];
		$PERMISSION_DELETE  =$_POST['PERMISSION_DELETE'];
		$PERMISSION_APPROVED =$_POST['PERMISSION_APPROVED'];
		$PERMISSION_REJECT   =$_POST['PERMISSION_REJECT'];
		$PERMISSION_COMPLETE =$_POST['PERMISSION_COMPLETE'];
		$PERMISSION_ALL     =$_POST['PERMISSION_ALL'];

		$stmts=$conn->prepare("SELECT USERNAME,PASSWORD FROM tbl_users WHERE USERNAME=? OR PASSWORD=?");
		$stmts->bind_param('ss',$USERNAME,$PASSWORD);
		$stmts->execute();
		$result=$stmts->get_result();
		if($result->num_rows>0){
			$_SESSION['error'] = 'Username or password already exist!';
		}else{
			$stmt=$conn->prepare("INSERT INTO tbl_users(FIRSTNAME,MI,LASTNAME,ROLE,USERNAME,PASSWORD,PERMISSION_ADD,PERMISSION_EDIT,PERMISSION_DELETE,PERMISSION_APPROVED, PERMISSION_REJECT, PERMISSION_COMPLETE,PERMISSION_ALL)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param('sssssssssssss',$FIRSTNAME,$MI,$LASTNAME,$ROLE,$USERNAME,$PASSWORD,$PERMISSION_ADD,$PERMISSION_EDIT,$PERMISSION_DELETE,$PERMISSION_APPROVED,$PERMISSION_REJECT, $PERMISSION_COMPLETE, $PERMISSION_ALL);
			if($stmt->execute()){
				$_SESSION['success'] = 'New user created successfully';
			}else{
				$_SESSION['error'] = $conn->error;
			}
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
		
	}
	header('location:'.$return);
?>