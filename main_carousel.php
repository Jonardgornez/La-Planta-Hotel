 <!-- Carousel Start -->
        <div class="header-carousel owl-carousel" id="home">
            <div class="header-carousel-item">
                <img src="template/images/firstImage.jpg" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption">
                    <div class="container align-items-center py-4">
                        <div class="row g-5 align-items-center">
                            <div class="col-xl-7 fadeInLeft animated" data-animation="fadeInLeft" data-delay="1s" style="animation-delay: 1s;">
                                <div class="text-start">
                                    <h4 class="text-primary text-uppercase fw-bold mb-4">Welcome To <?=$SYS_NAME;?></h4>
                                    <h1 class="display-4 text-uppercase text-white mb-4">Where Comfort Meets Elegance</h1>
                                    <p class="mb-4 fs-5"><?=$SYS_ABOUT;?>
                                    </p>
                                    <!-- <div class="d-flex flex-shrink-0">
                                        <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="book_form.php?reserve=nowform"><span class="fa fa-calendar-alt"></span> Book now</a>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-xl-5 fadeInRight animated" data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s;">
                                <div class="p-5">
                                        <div class="row g-4">
											<?php 
										if($SYS_LOGO==""){
										?>
										  <img class="brand-image" width="100" src="./dist/img/Logo.png">
										<?php }else{ ?>
										  <img class="brand-image" src="data:image/jpg;charset=utf8;base64,<?=base64_encode($SYS_LOGO); ?>">
										<?php }?>
                                       
                                        </div>
                                   
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-carousel-item">
                <img src="template/images/secondImage.jpg" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption">
                    <div class="container py-4">
                        <div class="row g-5 align-items-center">
                            <div class="col-xl-7 fadeInLeft animated" data-animation="fadeInLeft" data-delay="1s" style="animation-delay: 1s;">
                                <div class="text-start">
                                    <h4 class="text-primary text-uppercase fw-bold mb-4">Welcome To <?=$SYS_NAME;?></h4>
                                    <h1 class="display-4 text-uppercase text-white mb-4">Book Your Stay. Relax in Comfort.</h1>
                                    <p class="mb-4 fs-5"><?=$SYS_ABOUT;?>
                                    </p>
                                    <!-- <div class="d-flex flex-shrink-0">
                                        <a class="btn btn-primary rounded-pill text-white py-3 px-5" href="book_form.php?reserve=nowform">
										<span class="fa fa-calendar-alt"></span> Book now</a>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-xl-5 fadeInRight animated" data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s;">
                                <div class="p-5">
								<div class="row g-4">
									<?php 
								if($SYS_LOGO==""){
								?>
								  <img class="brand-image" width="100" src="./dist/img/Logo.png">
								<?php }else{ ?>
								  <img class="brand-image" src="data:image/jpg;charset=utf8;base64,<?=base64_encode($SYS_LOGO); ?>">
								<?php }?>
								</div>
                                   
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->