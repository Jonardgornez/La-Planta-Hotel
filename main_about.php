<div class="container-fluid about pb-5" id="about">
            <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div>
                            <h4 class="text-primary">About <?=$SYS_NAME;?></h4>
                            <h1 class="display-5 mb-4">A Secret Worth Sharing, a Paradise Worth Staying.</h1>
                            <p class="mb-5"><?=$SYS_ABOUT;?>
                            </p>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <div class="me-3"><i class="fas fa-glass-cheers fa-3x text-primary"></i></div>
                                        <div>
                                            <h4>Refreshments</h4>
                                            <p> Refreshments include light snacks and beverages, both hot and cold, served to energize or entertain guests. They range from cookies, fruits, and sandwiches to drinks like coffee, juice, soda, or cocktails, making them essential for gatherings and social events.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <div class="me-3"><i class="fas fa-dot-circle fa-3x text-primary"></i></div>
                                        <div>
                                            <h4>Attractions</h4>
                                            <p> Secret Paradise Resort is a serene mountain retreat surrounded by lush greenery and towering trees. Enjoy refreshing dips in natural spring pools, kayak or fish in tranquil ponds, and explore scenic nature trails. Unwind by the bonfire under a starlit sky, capturing breathtaking views along the way. A perfect escape for relaxation and adventure!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <div class="me-3"><i class="fas fa-hand-holding-usd fa-3x text-primary"></i></div>
                                        <div>
                                            <h4>Affordable Price</h4>
                                            <p>A perfect budget-friendly getaway for those seeking relaxation in nature. Whether you want adventure or tranquility, Secret Paradise Resort has something for everyone!                  </p>
                                        </div>
                                    </div>
                                </div>
                                <!--
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <div class="me-3"><i class="fas fa-lock fa-3x text-primary"></i></div>
                                        <div>
                                            <h4>Safety Lockers</h4>
                                            <p> A description paragraph is required when you are asked to describe features or characteristics of something.</p>
                                        </div>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="position-relative rounded">
                            <div class="rounded" style="margin-top: 40px;">
                                <div class="row g-0">
                                    <div class="col-lg-12">
                                        <div class="rounded mb-4">
                                            <img src="dist/img/about.jpg" class="img-fluid rounded w-100" alt="">
                                        </div>
                                        <div class="row gx-4 gy-0">
                                            <div class="col-6">
                                                <div class="counter-item bg-primary rounded text-center p-4 h-100">
                                                    <div class="counter-item-icon mx-auto mb-3">
                                                        <i class="fas fa-thumbs-up fa-3x text-white"></i>
                                                    </div>
                                                    <div class="counter-counting mb-3">
                                                        <span class="text-white fs-2 fw-bold" data-toggle="counter-upS">

                                                        <?php
                                                            $VIEW_VISITOR=0;
                                                            $VIEW_VISITOR = $rows_visitor['counts'];
                                                            if ($VIEW_VISITOR> 999999) {
                                                                $VIEW_VISITOR = number_format(($VIEW_VISITOR / 1000),1) . ' <span class="h1 fw-bold text-white">M +</span>';
                                                            }elseif ($VIEW_VISITOR > 1000) {
                                                                $VIEW_VISITOR = number_format(($VIEW_VISITOR / 1000),1) . ' <span class="h1 fw-bold text-white">K +</span>';
                                                            }
                                                            print $VIEW_VISITOR;
                                                            ?>

                                                        </span>
                                                        
                                                    </div>
                                                    <h5 class="text-white mb-0">Happy Visitors</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="counter-item bg-dark rounded text-center p-4 h-100">
                                                    <div class="counter-item-icon mx-auto mb-3">
                                                        <i class="fas fa-star fa-3x text-white"></i>
                                                    </div>
                                                    <div class="counter-counting mb-3">
                                                    <i class="fas fa-star star-light mr-1 main_star"></i>
													<i class="fas fa-star star-light mr-1 main_star"></i>
													<i class="fas fa-star star-light mr-1 main_star"></i>
													<i class="fas fa-star star-light mr-1 main_star"></i>
													<i class="fas fa-star star-light mr-1 main_star"></i>
													</div>
                                                    <h5 class="text-white mb-0">Ratings</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="rounded bg-primary p-4 position-absolute d-flex justify-content-center" style="width: 90%; height: 80px; top: -40px; left: 50%; transform: translateX(-50%);">
                                <h3 class="mb-0 text-white">20 Years Experiance</h3>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>