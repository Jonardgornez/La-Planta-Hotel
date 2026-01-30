<?php
	session_start();
	include "includes/conn.php";
	if(isset($_POST['login'])){
		$USERNAME = $conn->real_escape_string($_POST['USERNAME']);
		$PASSWORD = $conn->real_escape_string($_POST['PASSWORD']);
		$stats=1;
		$stmt =$conn->prepare("SELECT * FROM (SELECT te.ID AS UID, te.USERNAME, te.PASSWORD, te.ACC_STATUS, te.ROLE FROM tbl_users te) t WHERE t.USERNAME=? AND t.ACC_STATUS=?");
		$stmt->bind_param('si',$USERNAME,$stats);
		if($stmt->execute()){
			$result=$stmt->get_result();
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				if($PASSWORD==$row['PASSWORD']){
					$_SESSION['admin'] = $row['UID'];	
					if($row['ROLE']=="ADMIN"){
						header('location:home.php?dashboard=home');
						
					}elseif($row['ROLE']=="USER"){
						header('location:home.php?dashboard=home');
					}else{
						header('location: signin.php?error=error');
					}
					
					$host=$_SERVER['HTTP_HOST'];
				$uip=$_SERVER['REMOTE_ADDR'];
				$status=1;
				$sql=mysqli_query($conn,"INSERT INTO tbl_userlog(UID,USERNAME,USERIP,STATUS) VALUES('".$_SESSION['admin']."','".$USERNAME ."','$host','$status')");
				}else{
					$_SESSION['error'] = 'Incorrect password';
					header('location: signin.php?error=error');
				}
			}else{
				header('location: signin.php?error=error');
				$_SESSION['error'] = 'username or password not found!';
			}
		}
	}else{
		$_SESSION['error'] = 'Input admin credentials first';
		header('location: signin.php?error=error');
	}
?>