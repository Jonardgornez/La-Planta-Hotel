<?php
include('includes/session.php');
$_SESSION['admin']=="";
date_default_timezone_set('Asia/Manila');
$ldate=date( 'Y-m-d h:i:s A', time () );
mysqli_query($conn,"UPDATE tbl_userlog  SET LOGOUT = '$ldate' WHERE UID = '".$_SESSION['admin']."' ORDER BY ID DESC LIMIT 1");
session_unset();
header('location: ../index.php');
?>