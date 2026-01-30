<?php
session_start();
include "includes/conn.php";

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
          $SYS_EMAIL=$value_setting['SYS_EMAIL'];
          $SYS_ABOUT=$value_setting['SYS_ABOUT'];
          $SYS_ISDEFAULT=$value_setting['SYS_ISDEFAULT'];
          $SYS_SECOND_LOGO=$value_setting['SYS_SECOND_LOGO'];
          $SYS_SHORTNAME=$value_setting['SYS_SHORTNAME'];
          $SYS_NUMBER=$value_setting['SYS_NUMBER'];
          $SYS_FACEBOOK=$value_setting['SYS_FACEBOOK'];
          $SYS_TWITTER=$value_setting['SYS_TWITTER'];
          $SYS_INSTAGRAM=$value_setting['SYS_INSTAGRAM'];
          $SYS_LINKEDIN=$value_setting['SYS_LINKEDIN'];
         
        if($SYS_ISDEFAULT == "YES") {
            $checkedEng = 'checked';
        } elseif($SYS_ISDEFAULT == "NO") {
            $checkedHindi = 'checked';
        }
    }
      
}else{
      $SYS_ID ="";
      $SYS_NAME="";
      $SYS_ADDRESS="";
      $SYS_LOGO="";
      $SYS_EMAIL="";
      $SYS_ABOUT="";
      $SYS_ISDEFAULT="";
      $checkedHindi ="";
      $checkedEng="";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
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
      <link rel="icon" type="image/x-icon" href="../images/logo.png">
    <?php }else{ ?>
      <link rel="icon" type="image/x-icon" href="data:image/jpg;charset=utf8;base64,<?=base64_encode($SYS_LOGO); ?>">
    <?php }?>
        <link rel="icon" type="image/x-icon" href="../images/logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
        <link rel="stylesheet" href="../dist/css/adminlte.min.css">

		<link rel="stylesheet"href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-regular.css">
		<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-solid.css">
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    </head>
<body class="hold-transition login-page bg-dark" 
style="
background-image: url('simages/bg.jpgss');
background: rgba(1, 4, 136, 0.9);
/*height: 100%;*/
background-position: center;
background-repeat: no-repeat;
background-size: cover;
">


<div class="login-box" style="margin-top:0%">

  <div class="card card-outline card-secondary" style="background:rgba(0,0,0, 0.3);">
    <div class="card-header text-center">
   <?php 
    if($SYS_LOGO==""){
    ?>
      <img class="brand-image" width="100" src="../dist/img/Logo.png">
    <?php }else{ ?>
      <img class="brand-image" width="100" src="data:image/jpg;charset=utf8;base64,<?=base64_encode($SYS_LOGO); ?>">
    <?php }?>
    </div>

    <div class="card-body">
      <p class="login-box-msg">PLEASE LOGIN</p>
      <form action="signin_process.php" method="POST" class="needs-validation" autocomplete="off" novalidate>
	  
        <div class="input-group mb-3">
          <input type="text" name="USERNAME"  class="form-control" placeholder="USERNAME" required>
		  
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
          <div class="invalid-feedback">
              Username is required*
          </div>
        </div>
        <div class="input-group mb-3" id="show_hide_password">
          <input type="password" name="PASSWORD" class="form-control" placeholder="PASSWORD" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
            </div>
          </div>
          <div class="invalid-feedback">
              Password is required*
          </div>
        </div>
        
        <div class="row">
          <div class="col-12">
            <button type="submit" name="login" class="btn btn-info btn-block"><span class="fas fa-arrow-right"></span> Login</button>
          </div>
        </div>
		  
      </form>
	   <div class="social-auth-links text-center">
		<!--<a href="register.php" class="btn btn-block btn-primary">
          <i class="fab fa fa-user-plus mr-2"></i>
          CREATE ACCOUNT
        </a>
        ---->
        <!-- <a href="index.php" class="btn btn-block btn-primary">
          <i class="fa fa-home"></i>
          HOME
        </a> -->
      </div>
    <a href="forgot-password.php" class="text-center text-white"> <span class="fa fa-question-circle"></span> Forgot Password?</a>
    
	
	
  </div>
</div>	
  <!-- /.card -->
  <br>
  <?php
  		if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible' id='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
  	?>



<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>


<script type="text/javascript">
	$(document).ready(function () {
	window.setTimeout(function() {
		$("#alert").fadeTo(1000, 0).slideUp(1000, function(){
			$(this).remove(); 
		});
	}, 5000);

	});
</script>
<script>
 // Bootstrap 4 Validation
 $(".needs-validation").submit(function () {
    var form = $(this);
    if (form[0].checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }
    form.addClass("was-validated");
  });
</script>
	<script>
	$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
	</script>
	
</body>
</html>
