 <div class="container-fluid gallery pb-5" id="Gallery">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Our Gallery</h4>
                    <h1 class="display-5 mb-4">Captured Moments In <?=$SYS_NAME;?></h1>
					<?php
                    $sql = "SELECT * FROM tbl_gallery ORDER BY GALLERY_ID DESC LIMIT 1";
                    $sql=$conn->prepare($sql);
                    if($sql->execute()){
                      $result=$sql->get_result();
					if($result->num_rows >0){
					   $rows_a = $result->fetch_assoc();
                      ?>
                    <p class="mb-0"><?=$rows_a['GALLERY_ABOUT'];?></p>
					<?php }}else{ ?>
					
					<?php } ?>
                </div>
                <div class="row g-4">
					        <?php
                    $sql = "SELECT * FROM tbl_gallery ORDER BY GALLERY_ID DESC LIMIT 12";
                    $sql=$conn->prepare($sql);
                    if($sql->execute()){
                      $result=$sql->get_result();
                    while($row = $result->fetch_assoc()){
                      ?>
                    <div class="col-md-3 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="gallery-item">
						            <?php 
                          if($row['GALLERY_IMAGE']==""){
                          ?>
                            <img class="img-fluid rounded w-100 h-100" src="../dist/img/profile.jpg">
                          <?php }else{ ?>
							              <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($row['GALLERY_IMAGE']); ?>" class="img-fluid rounded w-100 h-100" alt="">
                            <div class="search-icon">
                                <a href="data:image/jpg;charset=utf8;base64,<?=base64_encode($row['GALLERY_IMAGE']); ?>" class="btn btn-light btn-lg-square rounded-circle" data-lightbox="Gallery-3"><i class="fas fa-search-plus"></i></a>
                            </div>

                          <?php }?>

                        </div>
                    </div>
					
					<?php }}; ?>
                </div>
            </div>
        </div>