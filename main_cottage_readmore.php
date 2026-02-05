<?php include "main_header.php";

if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['submit'])){
  //Verifying CSRF Token
	if (!empty($_POST['csrftoken'])) {
		if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
		$name=$_POST['NAME'];
		$email=$_POST['EMAIL'];
		$comment=$_POST['COMMENT'];
		$st1='1';
		$query=mysqli_query($conn,"INSERT into tbl_comments(NEWS_ID,NAME,EMAIL,COMMENT,STATUS) values('".$_GET['readmore']."','$name','$email','$comment','$st1')");
		if($query):
		 $_SESSION['success']="Your comment has been successfully submited!";
		  unset($_SESSION['token']);
		else :
		 $_SESSION['error']="Something went wrong. Please try again.";  

		endif;

	}
  }
}



$sql = "SELECT VIEW_COUNTER FROM tbl_cottage WHERE COT_ID = '".$_GET['readmore']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$visits = $row["VIEW_COUNTER"];
		$sql = "UPDATE tbl_cottage SET VIEW_COUNTER = $visits+1 WHERE COT_ID ='".$_GET['readmore']."'";
		$conn->query($sql);
	}
}else{
	echo "no results";
}



$currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$newsquery = "SELECT * FROM tbl_cottage WHERE COT_ID='".$_GET['readmore']."'"; 
$news_run=$conn->query($newsquery);
foreach($news_run as $c_rows);
	
$time_details=$c_rows['POSTING_DATE'];
				
				
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
                        <a href="index.php?#cottages" class="nav-item nav-link">Tables</a>
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
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Description</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.php?home=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?home=home#cottages">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">Description</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        <!-- Blog Start -->
        <div class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">DESCRIPTION</h4>
                    <h1 class="display-5 mb-4"><?=$c_rows['COT_NAME'];?></h1>
                   <!-- <p class="mb-0"><?=$c_rows['COT_DESCRIPTION'];?></p>--->
                </div>
                <div class="row g-4">
					
					
                     <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="blog-item">
                            <div class="blog-img">
								<?php 
								  if($c_rows['COT_IMAGE']==""){
								  ?>
								   <img src="dist/img/boxed-bg.jpg" class="img-fluid w-100 rounded-top" alt="User Image">
								  <?php }else{ ?>
									<a href="data:image/jpg;charset=utf8;base64,<?=base64_encode($c_rows['COT_IMAGE']); ?>" data-toggle="lightbox" data-title="<i class='fa fa-newspaper'></i> <?=$c_rows['COT_NAME'];?>" data-gallery="gallery" allowfullscreen="true">
									<img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($c_rows['COT_IMAGE']); ?>" class="img-fluid w-100 rounded-top">
									</a>
								  
								  <?php }?>
								  
                                <div class="blog-category py-2 px-4">&#x20B1;<?=number_format($c_rows['COT_PRICE'],2)?> - Guest <?=$c_rows['COT_NUM_GUEST'];?></div>
                                <div class="blog-date"><i class="fas fa-eye me-2"></i>
								<?php
										$VIEW_COUNTER=0;
										$VIEW_COUNTER =  htmlentities($c_rows['VIEW_COUNTER']);
										if ($VIEW_COUNTER> 999999) {
										$VIEW_COUNTER = number_format(($VIEW_COUNTER / 1000),1) . ' M';
										}elseif ($VIEW_COUNTER > 999) {
										$VIEW_COUNTER = number_format(($VIEW_COUNTER / 1000),1) . ' K';
										}
										print $VIEW_COUNTER;
										?>
										Views
								</div>
                            </div>
                            <div class="blog-content p-4">
                                <a href="#" class="h4 d-inline-block mb-4"><?=$c_rows['COT_NAME'];?></a>
								<p class="mb-4">Inclusion:
								<?=$c_rows['COT_INCLUSION'];?>
                                </p>
                                <p class="mb-4"><?=$c_rows['COT_DESCRIPTION'];?></p>
								 <!-- <a href="#" class="btn btn-primary rounded-pill py-2 px-4"><span class="fa fa-calendar-alt"></span> Book now</a> -->
                            </div>
                        </div>
                    </div>
					<div class="col-lg-8 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="blog-item">
                            <div class="blog-content p-4">
                                <h4 class="text-primary mb-4">Leave your comment</h4>
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
								<form method="POST">
									   <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
                                <div class="row g-4">
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" name="NAME" placeholder="Your Name" required>
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control border-0" name="EMAIL" placeholder="Your Email" required>
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                   
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control border-0" placeholder="Leave a message here" name="COMMENT" style="height: 160px" required></textarea>
                                            <label for="message">Comment</label>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Send Comment</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
						
						<!---start comment--->
						<br>
						<hr>
						<?php 

				if (isset($_GET['page_no']) && $_GET['page_no']!="") {
					$page_no = $_GET['page_no'];
					} else {
						$page_no = 1;
						}

					$total_records_per_page = 20;
					$offset = ($page_no-1) * $total_records_per_page;
					$previous_page = $page_no - 1;
					$next_page = $page_no + 1;
					$adjacents = "2"; 

					$result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `tbl_comments` WHERE NEWS_ID='".$_GET['readmore']."'");
					$total_records = mysqli_fetch_array($result_count);
					$total_records = $total_records['total_records'];
					$total_no_of_pages = ceil($total_records / $total_records_per_page);
					$second_last = $total_no_of_pages - 1; // total page minus 1

					$sts=1;
					$query="SELECT * FROM tbl_comments WHERE NEWS_ID='".$_GET['readmore']."' ORDER BY COMMENT_DATE DESC LIMIT $offset, $total_records_per_page";
					$query_run =$conn->query($query);
					if($query_run -> num_rows >0){
					foreach($query_run as $key=> $comment_news) {
					?>
					 
					  <img class="img-fluid rounded" width="50" src="dist/img/profile.jpg" alt="User Image">
					  <span class="username"><a href="#"><?=$comment_news['NAME'];?></a></span>
					  <span class="description">Shared publicly  

					  <?php
											
						$seconds_ago_comment = (time() - strtotime($comment_news['COMMENT_DATE']));
						if ($seconds_ago_comment >= 31536000) {
							echo "<span class='fa fa-calendar'></span> " . intval($seconds_ago_comment / 31536000) . " years ago";
						} elseif ($seconds_ago_comment >= 2419200) {
							echo "<span class='fa fa-calendar-week'></span> " . intval($seconds_ago_comment / 2419200) . " months ago";
						} elseif ($seconds_ago_comment >= 86400) {
							echo "<span class='fa fa-calendar-days'></span> " . intval($seconds_ago_comment / 86400) . " days ago";
						} elseif ($seconds_ago_comment >= 3600) {
							echo "<span class='fa fa-clock'></span> " . intval($seconds_ago_comment / 3600) . " hours ago";
						} elseif ($seconds_ago_comment >= 60) {
							echo "<span class='fa fa-clock'></span> " . intval($seconds_ago_comment / 60) . " minutes ago";
						} else {
							echo "<span class='fa fa-clock'></span> less than a minute ago";
						}
							
							?>
						  </span>
				   
					 
						<!-- post text -->
						<p><?=$comment_news['COMMENT'];?></p>

						<hr>
					<?php } ?>
			 
					<?php }else{?>
						<p class="card-title">
						 <i class="fas fa-comment text-teal"></i>
						  No Comments
						</p>
					<?php } ?>
						<!--end comment-->
						
						<!----START PAGINATION---->
						<nav aria-label="Page navigation example">
					<ul class="pagination">
				
						<li <?php if($page_no <= 1){ echo "class='disabled page-item'"; } ?>>
						<a class='page-link' <?php if($page_no > 1){ echo "href='?page_no=$previous_page&news=$news_id'"; } ?>>Previous</a>
						</li>
					<?php 
					if ($total_no_of_pages <= 10){  	 
						for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
							if ($counter == $page_no) {
						   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
								}else{
						   echo "<li class='page-item'><a class='page-link' href='?page_no=$counter&news=".urlencode(base64_encode($news_id))."'>$counter</a></li>";
								}
						}
					}
					elseif($total_no_of_pages > 10){
						
					if($page_no <= 4) {			
					 for ($counter = 1; $counter < 8; $counter++){		 
							if ($counter == $page_no) {
						   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
								}else{
						   echo "<li class='page-item'><a class='page-link' href='?page_no=$counter&news=".urlencode(base64_encode($news_id))."'>$counter</a></li>";
								}
						}
						echo "<li class='page-item'><a class='page-link'>...</a></li>";
						echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last&news=".urlencode(base64_encode($news_id))."'>$second_last</a></li>";
						echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages&news=".urlencode(base64_encode($news_id))."'>$total_no_of_pages</a></li>";
						}

					 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
						echo "<li class='page-item'><a class='page-link' href='?page_no=1&news=".urlencode(base64_encode($news_id))."'>1</a></li>";
						echo "<li class='page-item'><a class='page-link' href='?page_no=2&news=".urlencode(base64_encode($news_id))."'>2</a></li>";
						echo "<li class='page-item'><a class='page-link'>...</a></li>";
						for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
						   if ($counter == $page_no) {
						   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
								}else{
						   echo "<li class='page-item'><a class='page-link' href='?page_no=$counter&news=".urlencode(base64_encode($news_id))."'>$counter</a></li>";
								}                  
					   }
					   echo "<li class='page-item'><a class='page-link'>...</a></li>";
					   echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last&news=".urlencode(base64_encode($news_id))."'>$second_last</a></li>";
					   echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages&news=".urlencode(base64_encode($news_id))."'>$total_no_of_pages</a></li>";      
							}
						
						else {
						echo "<li class='page-item'><a class='page-link' href='?page_no=1&news=".urlencode(base64_encode($news_id))."'>1</a></li>";
						echo "<li class='page-item'><a class='page-link' href='?page_no=2&news=".urlencode(base64_encode($news_id))."'>2</a></li>";
						echo "<li class='page-item'><a class='page-link'>...</a></li>";

						for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
						  if ($counter == $page_no) {
						   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
								}else{
						   echo "<li class='page-item'><a href='?page_no=$counter&news=".urlencode(base64_encode($news_id))."' class='page-link'>$counter</a></li>";
								}                   
								}
							}
					}
				?>
					
					<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled page-item'"; } ?>>
					<a class='page-link' <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page&news=".urlencode(base64_encode($news_id))."'"; } ?>>Next</a>
					</li>
					<?php if($page_no < $total_no_of_pages){
						echo "<li class='page-item'><a href='?page_no=$total_no_of_pages&news=".urlencode(base64_encode($news_id))."' class='page-link'>Last</a></li>";
						} ?>
					
				</ul>
				</nav>
						<!----END PAGINATION---->
						
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

<?php include "main_footer_script.php";?>	
