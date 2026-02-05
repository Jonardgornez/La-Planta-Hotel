<?php include "main_header.php";

if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['send_message'])){
  //Verifying CSRF Token
	if (!empty($_POST['csrftoken'])) {
		if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {

		$C_NAME =$_POST["C_NAME"];
		$C_EMAIL =$_POST["C_EMAIL"];
		$C_PHONE =$_POST["C_PHONE"];
		$C_MESSAGE =$_POST["C_MESSAGE"];
		$C_SUBJECT =$_POST["C_SUBJECT"];
		$query=mysqli_query($conn,"INSERT into tbl_contact_us(C_NAME,C_EMAIL,C_PHONE,C_MESSAGE,C_SUBJECT) values('$C_NAME','$C_EMAIL','$C_PHONE','$C_MESSAGE','$C_SUBJECT')");
		if($query):
		 $_SESSION['success']="Your message has been successfully send!";
		  unset($_SESSION['token']);
		else :
		 $_SESSION['error']="Something went wrong. Please try again.";  

		endif;

	}
  }
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
                   <h1 class="fs-5 text-dark fw-bold">
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
                        <a href="index.php?#cottages" class="nav-item nav-link">Rooms</a>
                        <a href="index.php?#tables" class="nav-item nav-link">Tables</a>
						<div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="index.php?home=#Gallery" class="dropdown-item">Our Gallery</a>
                                <a href="index.php?#attractions" class="dropdown-item">Foods</a>
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
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Contact Us</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.php?breadcrumb-item=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">Contact</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="row g-5"> 
                    <div class="col-12 col-xl-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div>
                            <div class="pb-5">
                                <h4 class="text-primary">Get in Touch</h4>
                                <p class="mb-0">You can send your message or question through this form.</p>
                            </div>
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="contact-add-item rounded bg-light p-4">
                                        <div class="contact-icon text-primary mb-4">
                                            <i class="fas fa-map-marker-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4>Address</h4>
                                            <p class="mb-0"><?=$SYS_ADDRESS;?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-add-item rounded bg-light p-4">
                                        <div class="contact-icon text-primary mb-4">
                                            <i class="fas fa-envelope fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4>Mail Us</h4>
                                            <p class="mb-0"><?=$SYS_EMAIL;?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-add-item rounded bg-light p-4">
                                        <div class="contact-icon text-primary mb-4">
                                            <i class="fa fa-phone-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4>Telephone</h4>
                                            <p class="mb-0"><?=$SYS_NUMBER;?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-add-item rounded bg-light p-4">
                                        <div class="contact-icon text-primary mb-4">
                                            <i class="fab fa-firefox-browser fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4>Visit us</h4>
                                            <p class="mb-0">www.Laplantahotel.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-around bg-light rounded p-4">
                                       
                                        <a class="btn btn-xl-square btn-primary rounded-circle" href="<?php print $SYS_FACEBOOK; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-xl-square btn-primary rounded-circle" href="<?php print $SYS_TWITTER; ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a class="btn btn-xl-square btn-primary rounded-circle" href="<?php print $SYS_INSTAGRAM; ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                        <a class="btn btn-xl-square btn-primary rounded-circle" href="<?php print $SYS_LINKEDIN; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="bg-light p-5 rounded h-100">
                            <h4 class="text-primary mb-4">Send Your Message</h4>
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
								  <h4><i class='icon fa fa-check'></i> SUCCESS!</h4>
								  ".$_SESSION['success']."
								</div>
								";
								unset($_SESSION['success']);
							  }
							  ?>
                             <form method="POST" autocomplete="off">
							 <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
                                <div class="row g-4">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" name="C_NAME" placeholder="Your Name" required>
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control border-0" name="C_EMAIL" placeholder="Your Email" required>
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" name="C_PHONE" placeholder="Phone" required>
                                            <label for="phone">Your Phone</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">

                                            <input type="text" class="form-control border-0" name="C_SUBJECT" placeholder="Subject" required>
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control border-0" placeholder="Leave a message here" name="C_MESSAGE" style="height: 160px" required></textarea>
                                            <label for="message">Message</label>
                                        </div>

                                    </div>
                                    <div class="col-12">
										<button type="submit" name="send_message" class="btn btn-primary w-100 py-3">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="rounded">
                            <iframe class="rounded w-100" 
                            style="height: 400px;" src="https://maps.google.it/maps?q=<?=$SYS_ADDRESS; ?>&output=embed" 
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
