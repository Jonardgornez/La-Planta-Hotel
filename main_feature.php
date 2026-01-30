<div class="container-fluid feature py-5" id="features">
    <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Features</h4>
            <h1 class="display-5 mb-4">Features Rooms</h1>
        </div>
        <div class="row g-4">
            <?php 
                $cottage_search = "SELECT * FROM tbl_cottage ORDER BY COT_ID DESC LIMIT 3"; 
                $cottage_query=$conn->query($cottage_search);
                if($cottage_query -> num_rows >0):
                foreach($cottage_query as $c_rows){
            ?>
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="feature-item">
                  
                    <?php 
                    if($c_rows['COT_IMAGE']==""){
                    ?>
                    <img src="dist/img/boxed-bg.jpg" class="img-fluid w-100 rounded-top" alt="User Image">
                    <?php }else{ ?>
                    <a href="data:image/jpg;charset=utf8;base64,<?=base64_encode($c_rows['COT_IMAGE']); ?>" data-toggle="lightbox" data-title="<i class='fa fa-newspaper'></i> <?=$c_rows['COT_NAME'];?>" data-gallery="gallery" allowfullscreen="true">
                    <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($c_rows['COT_IMAGE']); ?>" class="img-fluid w-100 rounded-top">
                    </a>
                    
                    <?php }?>
                    <div class="feature-content p-4">
                        <div class="feature-content-inner">
                            <h4 class="text-white"><?=$c_rows['COT_NAME'];?></h4>
                            <p class="text-white"><?=substr($c_rows['COT_DESCRIPTION'], 0, 350);?>....
                            </p>
                            <a href="main_cottage_readmore.php?readmore=<?=$c_rows['COT_ID'];?>" class="btn btn-primary rounded-pill py-2 px-4"><span class="fa fa-chevron"></span> Read More <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>

                </div>
            </div>

            <?php } endif; ?>
        </div>
    </div>
</div>