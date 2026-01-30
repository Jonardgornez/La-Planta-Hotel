<?php
date_default_timezone_set('Asia/Manila');
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: index.php?session=error');
	}
	
	$sql = "SELECT * FROM tbl_users WHERE ID = '".$_SESSION['admin']."'";
	$query = $conn->query($sql);
	if($query->num_rows >0){
		$user = $query->fetch_assoc();
		$addedby =$user['LASTNAME'].', '.$user['FIRSTNAME'].' '.$user['MI'];

		  $PERMISSION_ADD=$user['PERMISSION_ADD'];
          $PERMISSION_EDIT=$user['PERMISSION_EDIT'];
          $PERMISSION_DELETE=$user['PERMISSION_DELETE'];
		  $approved=$user['PERMISSION_APPROVED'];
		  $rejected=$user['PERMISSION_REJECT'];
		  $completed=$user['PERMISSION_COMPLETE'];
		  $navbar=$user['ROLE'];
		  $sidebar=$user['ROLE'];
          if($PERMISSION_ADD=="YES"){$YES_ADD='';}else{$YES_ADD='disabled';}
		  if($PERMISSION_EDIT=="YES"){$YES_EDIT='';}else{$YES_EDIT='disabled';}
		  if($PERMISSION_DELETE=="YES"){$YES_DELETE='';}else{$YES_DELETE='disabled';}
		  if($approved=="YES"){$YES_APPROVED='';}else{$YES_APPROVED='disabled';}
		  if($rejected=="YES"){$YES_REJECTED='';}else{$YES_REJECTED='disabled';}
		  if($completed=="YES"){$YES_COMPLETED='';}else{$YES_COMPLETED='disabled';}
		  if($navbar=="USER"){$navbar_bg='bg-success';}else{$navbar_bg='navbar-primary';}
		  if($sidebar=="ADMIN"){$sidebar_bg='bg-navy';}else{$sidebar_bg='';}

	}else{
		header("locations: index.php?session=error");
	}

?>