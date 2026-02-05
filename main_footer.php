 <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="footer-item">
                            <a href="index.html" class="p-0">
                                <h4 class="text-white mb-4"><i class="fa-thin fa-hotel fa-bounce text-primary me-3"></i><?=$SYS_SHORTNAME;?></h4>
                                <!-- <img src="img/logo.png" alt="Logo"> -->
                            </a>
                            <p class="mb-2"><?=$SYS_ABOUT;?></p>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt text-primary me-3"></i>
                                <p class="text-white mb-0"><?php print $SYS_ADDRESS;?></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-envelope text-primary me-3"></i>
                                <p class="text-white mb-0"><?php print $SYS_EMAIL;?></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa fa-phone-alt text-primary me-3"></i>
                                <p class="text-white mb-0"><?php print $SYS_NUMBER;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-2">
                        <div class="footer-item">
                            <h4 class="text-white mb-4">Quick Links</h4>
                            <a href="#about"><i class="fas fa-angle-right me-2"></i> About Us</a>
                            <a href="#features"><i class="fas fa-angle-right me-2"></i> Feature</a>
                            <a href="#attractions"><i class="fas fa-angle-right me-2"></i> Attractions</a>
                            <a href="#Gallery"><i class="fas fa-angle-right me-2"></i> Gallery</a>
                            <a href="#cottages"><i class="fas fa-angle-right me-2"></i> Blog</a>
                            <a href="main_contact.php?home=contact"><i class="fas fa-angle-right me-2"></i> Contact us</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-2">
                        <div class="footer-item">
                            <h4 class="text-white mb-4">Support</h4>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Disclaimer</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Support</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> FAQ</a>
                            <a href="#"><i class="fas fa-angle-right me-2"></i> Help</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="footer-item">
                            <h4 class="text-white mb-4">Opening Hours</h4>
                            <div class="opening-date mb-3 pb-3">
                            <?php
                                $stmt=$conn->prepare('SELECT * FROM tbl_services');
                                $stmt->execute();
                                $ser=$stmt->get_result();
                                if($ser->num_rows >0):
                                    while($open=$ser->fetch_assoc()){

                            ?>
                                <div class="opening-clock flex-shrink-0">
                                    <h6 class="text-white mb-0 me-auto"><?=$open['SERVICE_FROM_DAY'].' - '.$open['SERVICE_END_DAY']; ?>:</h6>
                                    <p class="mb-0"><i class="fas fa-clock text-primary me-2"></i> <?=date('h:i A',strtotime($open['SERVICE_START'])).' - '.date('h:i A',strtotime($open['SERVICE_END'])); ?></p>
                                </div>
                                
                                <?php } endif;?>

                            </div>
                            <div>
                                <p class="text-white mb-2">Payment Accepted</p>
                                <img src="template/img/payment logo.png" style="height: 50px; width: 90px; "class="img-fluid" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>