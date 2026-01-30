<div class="container-fluid service py-5" id="ourservices">
            <div class="container service-section py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Our Service</h4>
                    <h1 class="display-5 text-white mb-4">Explore <?php print $SYS_NAME;?> service</h1>
					<?php
                    $sql = "SELECT * FROM tbl_services ORDER BY SERVICE_ID DESC LIMIT 1";
                    $sql=$conn->prepare($sql);
                    if($sql->execute()){
                      $result=$sql->get_result();
					if($result->num_rows >0){
					   $rows_a = $result->fetch_assoc();
                      ?>
                    <p class="mb-0 text-white"><?=$rows_a['SERVICE_ABOUT'];?></p>
					<?php }}else{ ?>
					
					<?php } ?>
					
                </div>
                <div class="row g-4">
                    <div class="col-0 col-md-1 col-lg-2 col-xl-2"></div>
                    <div class="col-md-12 col-lg-12 col-xl-12 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-days p-4">
                            <?php
                                $stmt=$conn->prepare('SELECT * FROM tbl_services');
                                $stmt->execute();
                                $ser=$stmt->get_result();
                                if($ser->num_rows >0):
                                    while($ser_result=$ser->fetch_assoc()){

                            ?>
                            <div class="py-2 border-bottom border-top d-flex align-items-center justify-content-between flex-wrap">
                                <h4 class="mb-0 pb-2 pb-sm-0"><?=$ser_result['SERVICE_FROM_DAY'].' - '.$ser_result['SERVICE_END_DAY']; ?></h4> 
                                <p class="mb-0">
                                <i class="fas fa-clock text-primary me-2"></i><?=date('h:i A',strtotime($ser_result['SERVICE_START'])).' - '.date('h:i A',strtotime($ser_result['SERVICE_END'])); ?>
                                </p>
                            </div>
                           <?php } endif;?>
                        </div>
                    </div>
                    <!----<div class="col-0 col-md-1 col-lg-2 col-xl-2"></div>---->

                    <!--<div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item p-4">
                            <div class="service-content">
                                <div class="mb-4">
                                    <i class="fas fa-home fa-4x"></i>
                                </div>
                                <a href="#" class="h4 d-inline-block mb-3">Private Gazebo</a>
                                <p class="mb-0">
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="service-item p-4">
                            <div class="service-content">
                                <div class="mb-4">
                                    <i class="fas fa-utensils fa-4x"></i>
                                </div>
                                <a href="#" class="h4 d-inline-block mb-3">Delicious Food</a>
                                <p class="mb-0">
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="service-item p-4">
                            <div class="service-content">
                                <div class="mb-4">
                                    <i class="fas fa-door-closed fa-4x"></i>
                                </div>
                                <a href="#" class="h4 d-inline-block mb-3">Safety Lockers</a>
                                <p class="mb-0">
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="service-item p-4">
                            <div class="service-content">
                                <div class="mb-4">
                                    <i class="fas fa-swimming-pool fa-4x"></i>
                                </div>
                                <a href="#" class="h4 d-inline-block mb-3">River Rides</a>
                                <p class="mb-0">
                                </p>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>