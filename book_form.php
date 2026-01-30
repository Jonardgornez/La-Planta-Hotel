<?php include "main_header.php";?>
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
                    </div>
                    <a href="main_receipt.php?home=home" class="btn btn-primary rounded-pill py-2 px-4 flex-shrink-0"><span class="fa fa-search"></span> My Reservation</a> -->
					<a href="main_receipt.php?home=home" class="btn btn-primary rounded-pill py-2 px-4 flex-shrink-0""><span class="fa fa-search"></span> My Reservation</a> &nbsp;
                    <a href="book_form.php?home=home" class="btn btn-primary rounded-pill py-2 px-4 flex-shrink-0""><span class="fa fa-calendar-alt"></span> Book Now</a>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Book Reservation</h4>
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
            <div class="container py-3 ">
                <div class="row g-5 "> 
				  <div class="col-xl-6 wow fadeInUp " data-wow-delay="0.4s">
                        <div class="bg-light p-5 rounded h-100">
							
							<div class="d-flex align-items-center">
								<h4 class="text-primary mb-4 me-3">PAYMENT TO GCASH: <?=$SYS_GCASH_NUMBER;?></h4>
								<!--<img src="template/img/qrcode1.jpg" alt="GCash QR Code" width="250" height="250" class="gcash-qr">-->
							</div>

							<p class="text-danger"><b>REMINDER:</b> <i>It is required to bring the orignal copy of your uploaded ID for validation. Payment is not refundable after reservation.</i></p>
							
                           <form class="needs-validation form-horizontal book_submit" autocomplete="off" enctype="multipart/form-data" novalidate onsubmit="disableButton()">
							 <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
                                <div class="row g-4">
								<!-- <div id="success_message"></div> -->
							   <div class="col-lg-12">
								<div class="form-group">
								  <input type="hidden" class="form-control cotidss" name="COT_ID" required>
								  <div class="invalid-feedback">No date selected</div>
								</div>
								</div>

							   <div class="col-lg-12">
								<div class="form-group">
								  <label for="" class="control-label font-weight-normal">Reference Number</label>
								  <input type="text" class="form-control" name="AUTO_NUMBER" value="<?=$number;?>" readonly required>
								</div>
								</div>
								<div class="col-lg-6">
								<div class="form-group">
								  <label for="" class="control-label font-weight-normal">Date Selected</label>
								  <input type="text"  class="form-control sdate" name="BOOK_DATE" readonly required>
								  
								</div>
								</div>
								<div class="col-lg-6">
								<div class="form-group">
								  <label for="" class="control-label font-weight-normal">TIME</label>
								  <input type="text"  class="form-control" value="<?=date("g:i:a A");?>" name="BOOK_TIME" readonly required>
								</div>
								</div>
								<div class="col-lg-12">
								<div class="form-group">
								  <label for="" class="control-label font-weight-normal">First Name</label>
								  <input type="text"  class="form-control" id="FIRSTNAME" name="FIRSTNAME" placeholder="" required>
								</div>
								</div>
								<div class="col-lg-12">
								<div class="form-group">
								  <label for="" class="control-label font-weight-normal">Middle Name</label>
								  <input type="text"  class="form-control" id="MIDDLENAME" name="MIDDLENAME" placeholder="" required>
								</div>
								</div>
								<div class="col-lg-12">
								<div class="form-group">
								  <label for="" class="control-label font-weight-normal">Last Name</label>
								  <input type="text"  class="form-control" id="LASTNAME" name="LASTNAME" placeholder="" required>
								</div>
								</div>
								<div class="col-lg-4">
								<div class="form-group">
								  <label for="" class="control-label font-weight-normal">Gender</label>
									<select style="width:100%" class="form-control" id="GENDER" name="GENDER" required>
									  <option value=""></option>
									  <option>MALE</option>
									  <option>FEMALE</option>
									</select>
								</div>
								</div>
								<div class="col-lg-4">
								<div class="form-group">
								  <label for="" class="control-label font-weight-normal">Date of Birth</label>
									<input type="date" id="DATE_OF_BIRTH" name="DATE_OF_BIRTH" class="form-control" required>
								</div>
								</div>
								<div class="col-lg-4" style="display:none">
								<div class="form-group">
								  <label for="" class="control-label font-weight-normal">Age</label>
								  <input type="text" class="form-control" id="AGE" name="AGE" readonly required>
								</div>
								</div>
								<div class="col-lg-4">
								<div class="form-group">
								  <label for="" class="control-label font-weight-normal">Mobile #</label>
								  <input type="text"  class="form-control" id="MOBILE" name="MOBILE" placeholder="" required>
								</div>
								</div>
			 
								<div class="col-lg-12">
								<div class="form-group">
								  <label for="" class="control-label font-weight-normal">Address</label>
								  <textarea type="text" rows="4" class="form-control" id="ADDRESS" name="ADDRESS" placeholder="" required></textarea>
								</div>
								</div>
			 

								<div class="col-lg-12">
								<div class="form-group">
								<label class="font-weight-normal">List of Acceptable Valid IDs (Any of the following with one (1) photocopy)</label>
								  <select style="width:100%" class="form-control select2 text-uppercase" name="VALID_ID_NUMBER" id="VALID_ID_NUMBER" required>
									<option value="" selected></option>

									<?php
									   $stmt =$conn->prepare("SELECT * FROM tbl_requirements ORDER BY REQ_NAME ASC");
									   if($stmt->execute()):
										  $requirments=$stmt->get_result();
										  if($requirments->num_rows >0):
										   while($reqrow = $requirments->fetch_assoc()){
									?>
									  <option><?=strtoupper($reqrow['REQ_NAME']);?></option>
									<?php }
									   endif;
									  endif;
									?>
								  </select>
								</div>
							  </div>

							  <div class="col-lg-12">
								<div class="form-group">
								<label class="font-weight-normal">Upload valid ID</label>
								<div class="custom-file">
								<input type="file" name="UPLOAD_ID" id="UPLOAD_ID" class="form-control custom-file-input" required>
								
								</div>
								</div>
							  </div>

							  <div class="col-lg-12">
								<div class="form-group">
								<label class="font-weight-normal">Upload ID with Selfie</label>
								<div class="custom-file">
								<input type="file" name="UPLOAD_WITH_SELFIE" id="UPLOAD_WITH_SELFIE" class="form-control custom-file-input" required>
								
								</div>
							  </div>
							  </div>
							 <fieldset class="border p-2 bg-white"> 
								<legend>AMOUNT PAYABLE</legend>
							  <div class="col-lg-12">
								<div class="form-group">
								  <label for="" class="control-label font-weight-normal">Cottage Price</label>
								  <input type="text"  class="form-control cot_price" id="cotprice" name="COT_PRICE" readonly required>
								</div>
								</div>
							  <div class="col-lg-12">
								<div class="form-group">
								  <label for="" class="control-label font-weight-normal">Down Payment</label>
								  <input type="number"  class="form-control" id="payment" name="DOWN_PAYMENT" placeholder="" required>
								</div>
								</div>
								<div class="col-lg-12">
								<div class="form-group">
								  <label for="" class="control-label font-weight-normal">Balance</label>
								  <input type="text" class="form-control cot_price" id="balance" name="BALANCE" readonly required>
								</div>
								</div>
								<div class="col-lg-12">
								<div class="form-group">
								  <label for="" class="control-label font-weight-normal">Payment Reference Number</label>
								  <input type="text"  class="form-control" id="PAYMENT_REF_NO" name="PAYMENT_REF_NO" placeholder="" required>
								</div>
								</div>
								<div class="col-lg-12">
								<div class="form-group">
								<label class="font-weight-normal">Proof of Payment</label>
								<div class="custom-file">
								<input type="file" name="PROOF_PAYMENT" id="PROOF_PAYMENT" class="form-control custom-file-input" required>
								
								</div>
							  </div>
							  </div>
							  
								<div class="col-lg-12" style="display:none">
								<div class="form-group">
								  <label for="" class="control-label font-weight-normal">STATUS</label>
								 <input type="text"  class="form-control" id="PAYMENT_STATUS" name="PAYMENT_STATUS" placeholder="" required>
								</div>
								</div>
							</fieldset>
							  <div class="col-lg-12">
									  <div class="form-group">
										<div class="form-check">
										<input class="form-check-input" name="TERMS_OF_SERVICE" type="checkbox" value="AGREED" id="flexCheckChecked" required>
										<label class="form-check-label" for="flexCheckChecked">
										By checking this box and clicking the 'Submit' button, you confirm that you accept the Resort Privacy Policy.
										</label>
										</div>
									</div>
								  </div>
									
									 <div class="col-12">
										<button type="submit" id='disabled' name="send_message" class="btn btn-primary w-100 py-3">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
					
                    <div class="col-12 col-xl-6 wow fadeInUp rounded" data-wow-delay="0.2s" style="border:1px solid #ccc">
                        <div>
                            <div class="py-3">
										 <select class="form-control select2 office_select" id="office_select" class="form-control" autofocus required>
										<option selected value="">-SELECT COTTAGE-</option>
										  <?php
											$sql = "SELECT * FROM tbl_cottage ORDER BY COT_NAME ASC";
											$query = $conn->query($sql);
											while($row = $query->fetch_assoc()){
										  ?>
										  <option data-ccot="<?=$row['COT_ID'];?>" data-price="<?=$row['COT_PRICE'];?>" value="<?=$row['COT_ID'];?>">[PRICE: <?=$row['COT_PRICE'];?>]-[GUEST: <?=$row['COT_NUM_GUEST'];?>] <?=$row['COT_NAME'];?></option>
										  <?php } ?>
									  </select>
									<div id="calendar" class="table-responsive"></div>
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
<script>
    function disableButton() {
         $('#disabled').prop('disabled', true);
 setTimeout(function() {
       $('#disabled').prop('disabled', false);
         
 }, 5000);
    }
</script>
<div class="modal fade" id="view_success_appointment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">success!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <div id="success_message"></div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary">CLOSE</a>
      </div>
    </div>
  </div>
</div>


