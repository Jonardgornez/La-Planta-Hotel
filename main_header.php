<?php 
error_reporting(0);
session_start();
 include "wp_admin/includes/conn.php";
 date_default_timezone_set("Asia/Manila");
$CURRENT_DATE =date('Y-m-d');
$checkedHindi ="";
$checkedEng="";
$sql_stmt =$conn->prepare("SELECT * FROM tbl_system_setting");
if($sql_stmt->execute()){
  $systm_result=$sql_stmt->get_result();
if($systm_result->num_rows >0){
    foreach ($systm_result as $key => $value_setting) {
          $SYS_ID =$value_setting['SYS_ID'];
          $SYS_NAME=$value_setting['SYS_NAME'];
          $SYS_ADDRESS=$value_setting['SYS_ADDRESS'];
          $SYS_LOGO=$value_setting['SYS_LOGO'];
          $SYS_LOGO=$value_setting['SYS_LOGO'];
          $SYS_EMAIL=$value_setting['SYS_EMAIL'];
          $SYS_ISDEFAULT=$value_setting['SYS_ISDEFAULT'];
          $SYS_ABOUT=$value_setting['SYS_ABOUT'];
          $SYS_SECOND_LOGO=$value_setting['SYS_SECOND_LOGO'];
          $SYS_SHORTNAME=$value_setting['SYS_SHORTNAME'];
          $SYS_NUMBER=$value_setting['SYS_NUMBER'];
          $SYS_FACEBOOK=$value_setting['SYS_FACEBOOK'];
          $SYS_TWITTER=$value_setting['SYS_TWITTER'];
          $SYS_INSTAGRAM=$value_setting['SYS_INSTAGRAM'];
          $SYS_LINKEDIN=$value_setting['SYS_LINKEDIN'];
          $SYS_GCASH_NUMBER=$value_setting['SYS_GCASH_NUMBER'];
        if($SYS_ISDEFAULT == "YES") {
            $checkedEng = 'checked';
        } elseif($SYS_ISDEFAULT == "NO") {
            $checkedHindi = 'checked';
        }
    }
      
}else{
  $SYS_ID ="";
  $SYS_NAME="";
  $SYS_ADDRESS="";;
  $SYS_LOGO="";
  $SYS_LOGO="";
  $SYS_EMAIL="";
  $SYS_ISDEFAULT="";
  $SYS_ABOUT="";
  $SYS_SECOND_LOGO="";
  $SYS_SHORTNAME="";
  $SYS_NUMBER="";
  $SYS_FACEBOOK="";
  $SYS_TWITTER="";
  $SYS_INSTAGRAM="";
  $SYS_LINKEDIN="";
  $SYS_GCASH_NUMBER="";

      $checkedHindi ="";
      $checkedEng="";
}
}
$stmtssssss =$conn->prepare("SELECT * FROM tbl_cottage"); 
$stmtssssss->execute();
$cot_rows=$stmtssssss->get_result();
$total_cottage = $cot_rows->num_rows; 


$CI	= "REF";	//Example only
$CIcnt = strlen($CI);
$offset	= $CIcnt + 6;

// Get the current month and year as two-digit strings 
$month = date("m"); // e.g. 09 
$year = date("y"); // e.g. 23  

// Get the last bill number from the database 
$stmt =$conn->prepare("SELECT AUTO_NUMBER FROM tbl_autonumber ORDER BY AUTO_NUMBER DESC"); 
$stmt->execute();
$result=$stmt->get_result();
$row = $result->fetch_assoc(); 
$lastid = $row['AUTO_NUMBER']; 	 

if(empty($lastid) || (substr($lastid, $CIcnt + 1, 2) != $month) || (substr($lastid, $CIcnt + 3, 2) != $year)) { 
 $number = "$CI-$month$year-0001"; 
} else { 
 // Increment the last four digits by one 
 $idd = substr($lastid, $offset); // e.g. 0001 
 $id = str_pad($idd + 1, 4, 0, STR_PAD_LEFT); // e.g. 0002 
 $number = "$CI-$month$year-$id"; 
} 

//select values from visitor_counter table
$sql     = "SELECT * FROM visitor_counter";
$result  = mysqli_query($conn, $sql);
$rows_visitor     = mysqli_fetch_array($result);
$visitor_count = $rows_visitor['counts'];

// setting counter = 1, if we have no counts value
if (empty($visitor_count)) {
$visitor_count = 1;
$sql1    = "INSERT INTO visitor_counter(counts) VALUES('$visitor_count')";
$result1 = mysqli_query($conn, $sql1);
}

//echo "You 're visitors No. ";
//echo $counter;

// Incrementing counts value
$plus_counter = $visitor_count+1;
$sql2         = "update visitor_counter set counts='$plus_counter'";
$result2      = mysqli_query($conn, $sql2);


?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <?php 
    if($SYS_NAME==""){
    ?>
       <title>Not Set</title>
    <?php }else{ ?>
      <title><?=$SYS_SHORTNAME;?> | <?=$SYS_NAME;?></title>
    <?php }?>
  
  <?php 
    if($SYS_LOGO==""){
    ?>
      <link rel="icon" type="image/x-icon" href="dist/img/logo.png">
    <?php }else{ ?>
      <link rel="icon" type="image/x-icon" href="data:image/jpg;charset=utf8;base64,<?=base64_encode($SYS_LOGO); ?>">
    <?php }?>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wdth,wght@0,75..100,300..800;1,75..100,300..800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
		 <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
      <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- Libraries Stylesheet -->
        <link href="template/lib/animate/animate.min.css" rel="stylesheet">
        <link href="template/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="template/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="template/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="template/css/style.css" rel="stylesheet">
		

    </head>