<?php include "main_header.php";

if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}
$link="";
if(isset($_POST['search'])){
  //Verifying CSRF Token
	if (!empty($_POST['csrftoken'])) {
		if(hash_equals($_SESSION['token'], $_POST['csrftoken'])) {

		$AUTO_NUMBER = $conn -> real_escape_string(strtoupper($_POST['AUTO_NUMBER']));
		$FIRSTNAME = $conn -> real_escape_string(strtoupper($_POST['FIRSTNAME']));
		$MIDDLENAME = $conn -> real_escape_string(strtoupper($_POST["MIDDLENAME"]));
		$LASTNAME =$conn -> real_escape_string(strtoupper($_POST["LASTNAME"]));
		$stmt =$conn->prepare("SELECT APP_ID, AUTO_NUMBER,FIRSTNAME,MIDDLENAME,LASTNAME FROM tbl_appointment WHERE AUTO_NUMBER=? AND FIRSTNAME=? AND MIDDLENAME=? AND LASTNAME=?");
		  $stmt->bind_param('ssss',$AUTO_NUMBER,$FIRSTNAME,$MIDDLENAME,$LASTNAME);
		  if($stmt->execute()){
		  $result =$stmt->get_result();
			if($result->num_rows >0){
				$row=$result->fetch_assoc();
				$_SESSION['admin'] = $row['APP_ID'];
				$link='main_receipt_pdf.php?AUTO_NUMBER='.$AUTO_NUMBER.'&FIRSTNAME='.$FIRSTNAME.'&MIDDLENAME='.$MIDDLENAME.'&LASTNAME='.$LASTNAME.'';
				$_SESSION['success']="1 result's found!";
			}else{
				$link="No result";
				$_SESSION['error']="No record found";
			}
		  }

	}
  }
}else{
	$_SESSION['info']="No search history";
}
?>
    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid nav-bar sticky-top px-4 py-2 py-lg-0">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="index.php?home=home" class="navbar-brand p-0">
                    <h1 class="display-6 text-dark">
					<!--<i class="fas fa-swimmer text-primary me-3"></i>-->
					<?php
					if($SYS_LOGO==""){
					?>
					  <img src="dist/img/Logo.png" class="brand-image img-circle" alt="Water Land Logo">
					<?php }else{ ?>
					  <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($SYS_LOGO); ?>" class="brand-image img-circle">
					<?php }?>
					<?=$SYS_NAME;?> </h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="index.php?home=home" class="nav-item nav-link active">Home</a>
                        <a href="index.php?#about" class="nav-item nav-link">About</a>
                        <a href="index.php?#ourservices" class="nav-item nav-link">Service</a>
                        <a href="index.php?#cottages" class="nav-item nav-link">Cottage</a>
						<div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="index.php?home=#Gallery" class="dropdown-item">Our Gallery</a>
                                <a href="index.php?#attractions" class="dropdown-item">Attractions</a>
                                <a href="main_feedback.php?#feedback" class="dropdown-item">Feedback</a>
                            </div>
                        </div>
                        <a href="main_contact.php?#nav-item_nav-link=contact" class="nav-item nav-link">Contact</a>
                    </div>
                    <!-- <div class="team-icon d-none d-xl-flex justify-content-center me-3">
                    <a class="btn btn-square btn-light rounded-circle mx-1" href="<?php print $SYS_FACEBOOK; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-light rounded-circle mx-1" href="<?php print $SYS_TWITTER; ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-light rounded-circle mx-1" href="<?php print $SYS_INSTAGRAM; ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square btn-light rounded-circle mx-1" href="<?php print $SYS_LINKEDIN; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div> -->
                    <a href="main_receipt.php?home=home" class="btn btn-primary rounded-pill py-2 px-4 flex-shrink-0""><span class="fa fa-search"></span> My Reservation</a> &nbsp;
                    <a href="book_form.php?home=home" class="btn btn-primary rounded-pill py-2 px-4 flex-shrink-0""><span class="fa fa-calendar-alt"></span> Book Now</a>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">View Reservation</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.php?breadcrumb-item=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">Reservation</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="row g-5"> 
				  <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="bg-light p-5 rounded h-100">
                            <h4 class="text-primary mb-4">View existing Reservation</h4>
							<p>To view your existing appointment. Please ensure that you provide complete and accurate information. </p>
							
                             <form method="POST" autocomplete="off">
							 <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
                                <div class="row g-4">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating">
											<input type="text" class="form-control border-1" name="AUTO_NUMBER" required>
                                            <label for="email">Reference Number</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-1" name="FIRSTNAME" placeholder="" required>
                                            <label for="email">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-1" name="MIDDLENAME" placeholder="" required>
                                            <label for="phone">Middle Name</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-1" name="LASTNAME" placeholder="" required>
                                            <label for="subject">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
										<button type="submit" name="search" class="btn btn-primary w-100 py-3">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
					
                    <div class="col-12 col-xl-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div>
                            <div class="pb-1">
                                <h4 class="text-primary">
									<?php
							  if(isset($_SESSION['error'])){
								echo "
								<div id='alert' class='alert alert-danger'>
								
								  <h4><i class='icon fa fa-warning'></i> ERROR!</h4>
								  ".$_SESSION['error']."
								</div>
								";
								unset($_SESSION['error']);
							  }
							  if(isset($_SESSION['success'])){
								echo "
								<div class='alert bg-primary text-white' id='alert'>
								  <h4><i class='icon fa fa-check'></i> FOUND!</h4>
								  ".$_SESSION['success']."
								</div>
								";
								unset($_SESSION['success']);
							  }
							  if(isset($_SESSION['info'])){
								echo "
								<div class='alert bg-warning text-white' id='alert'>
								  <h4><i class='icon fa fa-check'></i> MESSAGE!</h4>
								  ".$_SESSION['info']."
								</div>
								";
								unset($_SESSION['info']);
							  }
							  ?>
								</h4>
                                <p class="mb-0"></p>
                            </div>
                            <div class="">
                                    <div class="embed-responsive embed-responsive-16by9">
									  <?php if($link==""){
									   ?>
									    <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
										 <div class="rounded">
											<iframe class="rounded w-100 embed-responsive-item" 
											style="height: 1000px;" src="" 
											loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
										</div>
									  <?php }else{?>
										<iframe class="rounded w-100 embed-responsive-item" 
											style="height: 820px;" src="<?=$link;?>" 
											loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen="true"></iframe>
									  <?php } ?>
									</div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

 <!-- Footer Start -->

<?php include "main_footer.php";?>	
<!-- Footer End -->
<!-- Copyright Start -->
<?php include "main_copyright.php";?>	
<!-- Copyright End -->

<?php include "main_footer_script.php";?>	
