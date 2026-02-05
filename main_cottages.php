<div class="container-fluid blog pb-5" id="cottages">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Our Rooms</h4>
                    <h1 class="display-5 mb-4">Latest Rooms & Description</h1>
                   <?php
                    $sql = "SELECT * FROM tbl_cottage ORDER BY COT_ID DESC LIMIT 1";
                    $sql=$conn->prepare($sql);
                    if($sql->execute()){
                      $result=$sql->get_result();
					if($result->num_rows >0){
					   $rows_a = $result->fetch_assoc();
                      ?>
                    <p class="mb-0"><?=$rows_a['COT_ABOUT'];?></p>
					<?php }}else{ ?>
					
					<?php } ?>
                </div>
                <div class="row g-4">
				<!----START----->
					<?php
				$currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				 if (isset($_GET['page_no']) && $_GET['page_no']!="") {
					$page_no = $_GET['page_no'];
					} else {
						$page_no = 1;
						}

					$total_records_per_page = 12;
					$offset = ($page_no-1) * $total_records_per_page;
					$previous_page = $page_no - 1;
					$next_page = $page_no + 1;
					$adjacents = "2"; 

					$result_count = mysqli_query($conn,"SELECT *, COUNT(COT_ID) As total_records FROM `tbl_cottage` WHERE COT_STATUS='ACTIVE'");
					$total_records = mysqli_fetch_array($result_count);
					$total_records = $total_records['total_records'];
					$total_no_of_pages = ceil($total_records / $total_records_per_page);
					$second_last = $total_no_of_pages - 1; // total page minus 1
		
					$cottage_search = "SELECT * FROM tbl_cottage WHERE COT_STATUS='ACTIVE' ORDER BY POSTING_DATE DESC LIMIT $offset, $total_records_per_page"; 
					$cottage_query=$conn->query($cottage_search);
					if($cottage_query -> num_rows >0){
					foreach($cottage_query as $c_rows){
						
					$time=$c_rows['POSTING_DATE'];
				?>
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
                                <p class="mb-4"><?=substr($c_rows['COT_DESCRIPTION'], 0, 350);?>....
                                </p>
                                <a href="main_cottage_readmore.php?readmore=<?=$c_rows['COT_ID'];?>" class="btn btn-primary rounded-pill py-2 px-4"><span class="fa fa-chevron"></span> Read More <i class="fas fa-arrow-right ms-2"></i></a>
								 <!-- <a href="book_form_test.php?test=<?=$c_rows['COT_ID'];?>" class="btn btn-primary rounded-pill py-2 px-4"><span class="fa fa-calendar-alt"></span> Book now</a> -->
                            </div>
                        </div>
                    </div>
                    <?php } ?>
					
					<?php }else{ ?>
						<div class="list-group-items">
							<div class="row">
								<div class="btn col px-4 btn-danger">
										<span class="fa fa-calendar-lines-pen"></span> No Post
								</div>
							</div>
						</div>
					<?php } ?>
                   <!-----END---->
				   
				   <!----PAGINATION---->
				   <nav aria-label="Page navigation example">
					<ul class="pagination">
					
						<!---<li class='page-item'><a href='?page_no=1' class='page-link'>First</a></li>--->
						<li <?php if($page_no <= 1){ echo "class='disabled page-item'"; } ?>>
						<a class='page-link' <?php if($page_no > 1){ echo "href='?page_no=$previous_page#cottages'"; } ?>>Previous</a>
						</li>
					<?php 
					if ($total_no_of_pages <= 10){  	 
						for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
							if ($counter == $page_no) {
						   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
								}else{
						   echo "<li class='page-item'><a class='page-link' href='?page_no=$counter#cottages'>$counter</a></li>";
								}
						}
					}
					elseif($total_no_of_pages > 10){
						
					if($page_no <= 4) {			
					 for ($counter = 1; $counter < 8; $counter++){		 
							if ($counter == $page_no) {
						   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
								}else{
						   echo "<li class='page-item'><a class='page-link' href='?page_no=$counter#cottages'>$counter</a></li>";
								}
						}
						echo "<li class='page-item'><a class='page-link'>...</a></li>";
						echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last#cottages'>$second_last</a></li>";
						echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages#cottages'>$total_no_of_pages</a></li>";
						}

					 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
						echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
						echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
						echo "<li class='page-item'><a class='page-link'>...</a></li>";
						for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
						   if ($counter == $page_no) {
						   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
								}else{
						   echo "<li class='page-item'><a class='page-link' href='?page_no=$counter#cottages'>$counter</a></li>";
								}                  
					   }
					   echo "<li class='page-item'><a class='page-link'>...</a></li>";
					   echo "<li class='page-item'><a class='page-link' href='?page_no=$second_last#cottages'>$second_last</a></li>";
					   echo "<li class='page-item'><a class='page-link' href='?page_no=$total_no_of_pages#cottages'>$total_no_of_pages</a></li>";      
							}
						
						else {
						echo "<li class='page-item'><a class='page-link' href='?page_no=1'>1</a></li>";
						echo "<li class='page-item'><a class='page-link' href='?page_no=2'>2</a></li>";
						echo "<li class='page-item'><a class='page-link'>...</a></li>";

						for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
						  if ($counter == $page_no) {
						   echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
								}else{
						   echo "<li class='page-item'><a href='?page_no=$counter#cottages' class='page-link'>$counter</a></li>";
								}                   
								}
							}
					}
				?>
					
					<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled page-item'"; } ?>>
					<a class='page-link' <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page#cottages'"; } ?>>Next</a>
					</li>
					<?php if($page_no < $total_no_of_pages){
						echo "<li class='page-item'><a href='?page_no=$total_no_of_pages#cottages' class='page-link'>Last</a></li>";
						} ?>
					
				</ul>
				</nav>
				   <!----END OF PAGINATION---->
				   
                </div>
            </div>
        </div>