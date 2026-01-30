<div class="container-fluid testimonial py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Feedback</h4>
                    <h1 class="display-5 text-white mb-4">Our Clients Riviews</h1>
                    <p class="text-white mb-0">
                    </p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
                    <?php 
						$stmt=$conn->prepare("SELECT * FROM tbl_review ORDER BY review_id DESC LIMIT 5");
						$stmt->execute();
						$rev_query=$stmt->get_result();
						if($rev_query->num_rows >0):
							
							foreach($rev_query as $rev_rows){
					?>
                    <div class="testimonial-item p-4">
                        <p class="text-white fs-4 mb-4"><?=$rev_rows['user_review'];?>
                        </p>
                        <div class="testimonial-inner">
                            <div class="testimonial-img">
                                <img src="dist/img/profile.jpg" class="img-fluid" alt="Image">
                                <div class="testimonial-quote btn-lg-square rounded-circle"><i class="fa fa-quote-right fa-2x"></i>
                                </div>
                            </div>
                            <div class="ms-4">
                                <h4 class="text-white"><?=$rev_rows['user_name'];?></h4>
                                <p class="text-start text-white"><?=$rev_rows['user_email'];?></p>
                                <div class="d-flex text-primary">  
                                  
                                    <?php
										if($rev_rows["user_rating"]==5){
											print '<i class="fas fa-star text-warning"></i>';
											print '<i class="fas fa-star text-warning"></i>';
											print '<i class="fas fa-star text-warning"></i>';
											print '<i class="fas fa-star text-warning"></i>';
											print '<i class="fas fa-star text-warning"></i>';
										}elseif($rev_rows["user_rating"]==4){
											print '<i class="fas fa-star text-warning"></i>';
											print '<i class="fas fa-star text-warning"></i>';
											print '<i class="fas fa-star text-warning"></i>';
											print '<i class="fas fa-star text-warning"></i>';
											print '<i class="fas fa-star text-white"></i>';
										}elseif($rev_rows["user_rating"]==3){
											print '<i class="fas fa-star text-warning"></i>';
											print '<i class="fas fa-star text-warning"></i>';
											print '<i class="fas fa-star text-warning"></i>';
											print '<i class="fas fa-star text-white"></i>';
											print '<i class="fas fa-star text-white"></i>';
											
										}elseif($rev_rows["user_rating"]==2){
											print '<i class="fas fa-star text-warning"></i>';
											print '<i class="fas fa-star text-warning"></i>';
											print '<i class="fas fa-star text-white"></i>';
											print '<i class="fas fa-star text-white"></i>';
											print '<i class="fas fa-star text-white"></i>';
										}elseif($rev_rows["user_rating"]==1){
											print '<i class="fas fa-star text-warning"></i>';
											print '<i class="fas fa-star text-white"></i>';
											print '<i class="fas fa-star text-white"></i>';
											print '<i class="fas fa-star text-white"></i>';
											print '<i class="fas fa-star text-white"></i>';
										}else{
											print '<i class="fas fa-star text-white"></i>';
											print '<i class="fas fa-star text-white"></i>';
											print '<i class="fas fa-star text-white"></i>';
											print '<i class="fas fa-star text-white"></i>';
											print '<i class="fas fa-star text-white"></i>';
										}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
				<?php } endif;?>
                    
                </div>
            </div>
        </div>