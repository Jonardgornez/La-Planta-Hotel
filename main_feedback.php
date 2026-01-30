<?php include "main_header.php";?>
<style>
   
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-image: linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%);
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .progress-label-left {
            float: left;
            margin-right: 0.5em;
            line-height: 1em;
        }
        .progress-label-right {
            float: right;
            margin-left: 0.3em;
            line-height: 1em;
        }
        .star-light {
            color:#e9ecef;
        }

        .row {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
    </style>
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
                    <a href="#" class="btn btn-primary rounded-pill py-2 px-4 flex-shrink-0"><span class="fa fa-search"></span> My Reservation</a> -->
                    <a href="main_receipt.php?home=home" class="btn btn-primary rounded-pill py-2 px-4 flex-shrink-0""><span class="fa fa-search"></span> My Reservation</a> &nbsp;
                    <a href="book_form.php?home=home" class="btn btn-primary rounded-pill py-2 px-4 flex-shrink-0""><span class="fa fa-calendar-alt"></span> Book Now</a>
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Feedback/Rating </h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.php?home=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?home=home#cottages">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">Description</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Blog Start -->
        <div class="container-fluid blog py-0">
            <div class="container py-0">
                <!-- <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">DESCRIPTION</h4>
                    <h1 class="display-5 mb-4"></h1>
                   <p class="mb-0"><?=$SYS_ABOUT;?>
                    </p>
                </div> -->
                <div class="row g-4">
			 <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.2s">
				<div class="blog-item">
			  <div class="card">
				  <div class="card-header">
					<h4 class="card-title  text-sm"> 
						<i class="fa fa-pen"></i>Feedback
				  </h4>
				  </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-3 text-center">
                        <?php 
						if($SYS_LOGO==""){
						?>
						  <img class="hidden-xs d-none d-sm-block" src="dist/img/LOGO DESIGN.png" width="230">
						<?php }else{ ?>
						  <img class="hidden-xs d-none d-sm-block" width="230" src="data:image/jpg;charset=utf8;base64,<?=base64_encode($SYS_LOGO); ?>">
						<?php }?>
    					
    				</div>
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
    					<div class="mb-3">
    						<i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
	    				</div>
    					<h3><span id="total_review">0</span> Feedback</h3>
						<button type="button" name="add_review" id="add_review" class="btn btn-primary rounded-pill text-white py-3 px-5">Write Feedback</button>
    				</div>
    				<div class="col-sm-4">
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p>
    				</div>
					
    			</div><i class="mt-3">Recent Feedback</i>
				<div class="mt-3" id="review_content"></div>
              </div>
              <!-- /.card-body -->
			  <div class="card-footer">
			  
			  </div>
            </div>
                           
                        </div>
                    </div>
	
                </div>
            </div>
        </div>
        <!-- Blog End -->

        <!-- Footer Start -->

<?php include "main_footer.php";?>	
<!-- Footer End -->

<!-- Copyright Start -->

<?php include "main_copyright.php";?>	
<!-- Copyright End -->
 <div id="review_modal" class="modal fade" tabindex="-1" role="dialog">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Feedback</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1" style="cursor: pointer;"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2" style="cursor: pointer;"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3" style="cursor: pointer;"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4" style="cursor: pointer;"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5" style="cursor: pointer;"></i>
	        	</h4>
	        	<div class="form-group">
                    <label for="">Your Name:</label>
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div>
	        	<div class="form-group">
                    <label for="">Comment:</label>
	        		<textarea rows="8" name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group mt-4">
	        		<button type="button" class="btn btn-primary btn-block" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

<?php include "main_footer_script.php";?>	
