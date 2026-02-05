<?php @include "includes/header.php";?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- .navbar -->
  <?php @include "includes/navbar.php";?>
  <!-- /.navbar -->
  <?php @include "includes/sidebar.php";?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rooms</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Rooms</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
		  
            <?php
              if(isset($_SESSION['error'])){
                echo "
                <div id='alert' class='alert alert-danger' id='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-warning'></i> ERROR!</h4>
                  ".$_SESSION['error']."
                </div>
                ";
                unset($_SESSION['error']);
              }
              if(isset($_SESSION['success'])){
                echo "
                <div id='alert' class='alert alert-success' id='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-check'></i> SUCCESS!</h4>
                  ".$_SESSION['success']."
                </div>
                ";
                unset($_SESSION['success']);
              }
              ?>
		  
            <div class="card">
              <div class="card-header">
               <h3 class="card-title"> 
              <a href="#add_member" data-toggle="modal" class="btn btn-primary btn-sm <?=$YES_ADD;?>"><i class="fa fa-user-plus"></i> NEW</a>
              <button data-target="#CottageDesc" data-toggle="modal" class="btn btn-primary btn-sm" <?=$YES_EDIT;?>> <span class="fa fa-pen"></span> ROOM DESCRIPTION</button>
            </h3>
			      	<div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm text-sm">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>IMAGE</th>
                    <th class="text-nowrap">ROOMS NO</th>
                    <th class="text-nowrap">ROOMS NAME</th>
                    <th class="text-nowrap">DESCRIPTION</th>
                    <th>PRICE/CAPACITY</th>
                    <th class="text-nowrap">INCLUSION</th>
                    <th>VIEWS</th>
                    <th>STATUS</th>
                    <th>ACTIONS</th>
                  </tr>
                  </thead>
                  <tbody>
				    <?php
                    $sql = "SELECT * FROM tbl_cottage ORDER BY COT_NUMBER ASC";
                    $query = $conn->query($sql);
                    $cnt=1;
                    while($row = $query->fetch_assoc()){
                       
                        ?>
                        <tr>
                            <td><?=$cnt++; ?></td>
                            <td>
                            <?php 
                          if($row['COT_IMAGE']==""){
                          ?>
                            <img width="100" height="100" class="img-thumbnail" src="../dist/img/profile.jpg" alt="User profile picture">
                          <?php }else{ ?>
                            <a href="data:image/jpg;charset=utf8;base64,<?=base64_encode($row['COT_IMAGE']); ?>" data-toggle="lightbox" data-title="<?=$row['COT_NAME'];?>" data-gallery="gallery" width="500">
                            <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($row['COT_IMAGE']); ?>" width="100" height="100" class="img-circle mb-2">
                          </a>
                          <?php }?>
                          
                            </td>
                            <td><?=$row['COT_NUMBER']; ?></td>
                            <td><?=$row['COT_NAME']; ?></td>
                            <td><?=$row['COT_DESCRIPTION']; ?></td>
                            <td><?=$row['COT_PRICE']; ?> [<?=$row['COT_NUM_GUEST']; ?>]</td>
                            <td><?=$row['COT_INCLUSION']; ?></td>
                            <td>
                          <label class="text-primary">
                            <?php
                              $VIEW_COUNTER=0;
                              $VIEW_COUNTER =  htmlentities($row['VIEW_COUNTER']);
                              if ($VIEW_COUNTER> 999999) {
                              $VIEW_COUNTER = number_format(($VIEW_COUNTER / 1000),1) . ' M';
                              }elseif ($VIEW_COUNTER > 999) {
                              $VIEW_COUNTER = number_format(($VIEW_COUNTER / 1000),1) . ' K';
                              }
                              print $VIEW_COUNTER;
                          ?>
                            </td>
                            <td>
                            <?php 
                                if($row['COT_STATUS'] =="ACTIVE"){

                            ?>
                            <button class="btn btn-success btn-sm" data-cotnum="<?=$row['COT_NUMBER']; ?>" data-cotstats="<?=$row['COT_STATUS'];?>" data-cotid="<?=$row['COT_ID'];?>" onclick="actionsCot(this);" data-jario="tooltip" data-placement="top" title="PLEASE TAKE ACTIONS" <?=$YES_EDIT;?>>Active</button>
                           <?php } else{?>
                            <button class="btn btn-danger btn-sm" data-cotnum="<?=$row['COT_NUMBER']; ?>" data-cotstats="<?=$row['COT_STATUS'];?>" data-cotid="<?=$row['COT_ID'];?>" onclick="actionsCot(this);" data-jario="tooltip" data-placement="top" title="PLEASE TAKE ACTIONS" <?=$YES_EDIT;?>>Deactive</button>
                            <?php } ?>
                            </td>
                            <td align="right">
                            <div class="btn-group">

                            <button class="btn btn-primary btn-sm"
                            data-cotid="<?=$row['COT_ID'];?>" 
                            data-cotname="<?=$row['COT_NAME'];?>"
                            data-cotdesc="<?=$row['COT_DESCRIPTION'];?>"
                            data-cotprice="<?=$row['COT_PRICE'];?>"
                            data-cotguest="<?=$row['COT_NUM_GUEST'];?>"
                            data-cotinclus="<?=$row['COT_INCLUSION'];?>"
                            data-cotstats="<?=$row['COT_STATUS'];?>"
                            onclick="editCot(this);" data-jario="tooltip" data-placement="top" title="EDIT" <?=$YES_EDIT;?>>
                            <i class="fa-solid fa fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" 
                            data-cotid="<?=$row['COT_ID'];?>" data-cotname="<?=$row['COT_NAME'];?>"
                            onclick="deleteCot(this);" data-jario="tooltip" data-placement="top" title="DELETE"  <?=$YES_DELETE;?>>
                            <i class="fa-solid fa fa-trash"></i>
                            </button>
                                        </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "includes/cottage_modal.php";?>
 <?php include "includes/footer.php";?>

 <script type="text/javascript">
 function editCot(self) {
      var cotid = self.getAttribute("data-cotid");
      var cotname = self.getAttribute("data-cotname");
      var cotdesc = self.getAttribute("data-cotdesc");
      var cotprice = self.getAttribute("data-cotprice");
      var cotguest = self.getAttribute("data-cotguest");
      var cotinclus = self.getAttribute("data-cotinclus");
      var cotstats = self.getAttribute("data-cotstats");
      document.getElementsByClassName("edit_cotid")[0].value= cotid;
      document.getElementsByClassName("edit_cotname")[0].value= cotname;
      document.getElementsByClassName("edit_cotdesc")[0].value= cotdesc;
      document.getElementsByClassName("edit_cotprice")[0].value= cotprice;
      document.getElementsByClassName("edit_cotguest")[0].innerHTML= cotguest;
      document.getElementsByClassName("edit_cotinclus")[0].value= cotinclus;
      document.getElementsByClassName("edit_cotstats")[0].innerHTML= cotstats;
      $("#editCot_modal").modal("show");
    }

    function deleteCot(self) {
      var cotid = self.getAttribute("data-cotid");
      var cotname = self.getAttribute("data-cotname");
      document.getElementById("del_cotid").value = cotid;
      document.getElementById("del_cotname").innerHTML = cotname;
      $("#member_del_modal").modal("show");
    }
    function actionsCot(self) {
      var cotid = self.getAttribute("data-cotid");
      var cotstats = self.getAttribute("data-cotstats");
      var cotnumber = self.getAttribute("data-cotnum");
      document.getElementById("actions_cotid").value = cotid;
      document.getElementById("actions_cotstats").innerHTML = cotstats;
      document.getElementById("actions_cotnumber").innerHTML = cotnumber;
      $("#member_actions_modal").modal("show");
    }

</script> 

</body>
</html>

