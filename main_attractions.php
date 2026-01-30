<div class="container-fluid attractions py-5" id="attractions">
            <div class="container attractions-section py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Foods</h4>
                    <h1 class="display-5 text-white mb-4">Explore <?=$SYS_NAME;?> Foods</h1>
                    <!--<p class="text-white mb-0"><?=$SYS_ABOUT;?>-->
                    </p>
                    <?php
                    $sqla = "SELECT * FROM tbl_attractions ORDER BY ATTRACT_ID DESC LIMIT 1";
                    $sqla=$conn->prepare($sqla);
                    if($sqla->execute()){
                      $results=$sqla->get_result();
					if($results->num_rows >0){
					   $rows_as = $results->fetch_assoc();
                      ?>
                    <p class="mb-0" style="color:rgb(255, 255, 255);"><?=$rows_as['ATTRACT_ABOUT'];?></p>
					<?php }}else{ ?>
					
					<?php } ?>

                </div>
                <div class="owl-carousel attractions-carousel wow fadeInUp" data-wow-delay="0.1s">
                 <?php
                    $sql = "SELECT * FROM tbl_attractions ORDER BY ATTRACT_ID";
                    $sql=$conn->prepare($sql);
                    if($sql->execute()){
                      $result=$sql->get_result();
                    while($row = $result->fetch_assoc()){
                      ?>
                        <?php 
                          if($row['ATTRACT_IMAGE']==""){
                          ?>
                            <div class="attractions-item wow fadeInUp" data-wow-delay="0.2s">
                                <img src="../dist/img/profile.jpg" class="img-fluid rounded w-100" alt="">
                                <!-- <a href="#" class="attractions-name"></a> -->
                            </div>
                          <?php }else{ ?>
                            <div class="attractions-item wow fadeInUp" data-wow-delay="0.2s">
                                <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($row['ATTRACT_IMAGE']); ?>" class="img-fluid rounded w-100" alt="">
                                <a href="#" class="attractions-name"><?=$row['ATTRACT_DESC']?></a>
                            </div>
                          <?php }?>
                   
                    <?php }}; ?>
                </div>
            </div>
        </div>