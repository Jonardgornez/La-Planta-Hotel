<div class="container-fluid service py-5" id="ourservices">
            <div class="container service-section py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Our Service</h4>
                    <
                    <h1 class="display-5 text-white mb-4">Explore <?php print $SYS_NAME;?> service</h1>
                    <!-- <p style="color:#fff">La Planta Hotel and Restaurant offers comfortable accommodations, a relaxing swimming pool, and a farm-to-table dining experience featuring authentic Negrense cuisine. Our services also include refreshing beverages, warm and attentive hospitality, and assistance with local activities such as island visits and whale and dolphin watching, ensuring a pleasant and memorable stay for every guest.</p> -->
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
                    
                </div>
            </div>
        </div>