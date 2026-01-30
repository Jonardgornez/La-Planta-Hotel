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
            <h1>Attractions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attractions</li>
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
                <a href="#_add_modal" data-toggle="modal" class="btn btn-primary btn-sm <?=$YES_ADD;?>"><i class="fa fa-plus"></i> NEW</a>
                <button data-target="#GalleryDesc" data-toggle="modal" class="btn btn-primary btn-sm" <?=$YES_EDIT;?>> <span class="fa fa-pen"></span> ATTRACTIONS DESCRIPTION</button>
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
                    <th>PHOTOS</th>
                    <th>DESCRIPTION</th>
                    <th>SIZE</th>
                    <th>ACTIONS</th>
                  </tr>
                  </thead>
                  <tbody>
				        	<?php
                    $sql = "SELECT * FROM tbl_attractions ORDER BY ATTRACT_ID DESC";
                    $sql=$conn->prepare($sql);
                    if($sql->execute()){
                      $result=$sql->get_result();
				        	  $cnt=1;
                    while($row = $result->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?=$cnt++; ?></td>
                          <td>
                          <?php 
                          if($row['ATTRACT_IMAGE']==""){
                          ?>
                            <img width="80" height="80" class="img-thumbnail" src="../dist/img/profile.jpg" alt="User profile picture">
                          <?php }else{ ?>
                            <a href="data:image/jpg;charset=utf8;base64,<?=base64_encode($row['ATTRACT_IMAGE']); ?>" data-toggle="lightbox" data-title="<?=$row['ATTRACT_DESC'];?>" data-gallery="gallery">
                            <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($row['ATTRACT_IMAGE']); ?>" width="80" height="80" class="img-thumbnail  mb-2">
                          </a>
                          <?php }?>
                          </td>
                          <td><?=$row['ATTRACT_DESC'];?></td>
                          <td><?=$row['ATTRACT_SIZE'];?></td>
                          <td align="right">
							            <div class="btn-group">
                            <button class="btn btn-primary btn-sm"
                            data-attractid="<?=$row['ATTRACT_ID'];?>" 
                            data-attractdesc="<?=$row['ATTRACT_DESC'];?>"
                            onclick="editLGU(this);" data-jario="tooltip" data-placement="top" title="EDIT" <?=$YES_EDIT;?>><i class="fa-solid fa fa-edit"></i> </button>
                            <button class="btn btn-danger btn-sm" 
                            data-attractid="<?=$row['ATTRACT_ID'];?>" 
                            onclick="deleteLGU(this);" data-jario="tooltip" data-placement="top" title="DELETE" <?=$YES_DELETE;?>><i class="fa-solid fa fa-trash"></i> </button>
							            </div>
                          </td>
                        </tr>
                      <?php
                    }
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
  <?php include "includes/attractions_modal.php";?>
 <?php include "includes/footer.php";?>

 <script type="text/javascript">
 function editLGU(self) {
      var attractid = self.getAttribute("data-attractid");
      var attractdesc = self.getAttribute("data-attractdesc");
      document.getElementsByClassName("edit_attractid")[0].value = attractid;
      document.getElementsByClassName("edit_attractdesc")[0].value = attractdesc;
      $("#edit_modal").modal("show");
    }

    function deleteLGU(self) {
      var attractid = self.getAttribute("data-attractid");
      document.getElementsByClassName("del_attractid")[0].value = attractid;
      $("#del_modal").modal("show");
    }
</script> 
<script>
        $(document).ready(function () {

            $(document).on('click', '.remove-btn', function () {
                $(this).closest('.main-form').remove();
            });
            $(document).on('click', '.add-more-form', function () {
              
                $('.paste-new-forms').append('<div class="main-form">\
                <div class="row">\
                    <div class="col-sm-12">\
                        <label class="control-label font-weight-normal">DESCRIPTION</label>\
                        <div class="input-group">\
                            <input type="text" class="form-control" name="ATTRACT_DESC[]" required>\
                            <div class="input-group-prepend">\
                              <button type="button" class="btn btn-danger remove-btn"><i class="fa fa-times"></i></button>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-sm-12">\
                        <label class="control-label font-weight-normal">IMAGE</label>\
                        <div class="input-group">\
                            <div class="custom-file">\
                            <input type="file" name="ATTRACT_IMAGE[]" class="form-control custom-file-input" required>\
                            <label class="custom-file-label" for="customFile">Choose file</label>\
                            </div>\
                            <div class="input-group-prepend">\
                              <button type="button" class="btn btn-danger remove-btn"><i class="fa fa-times"></i></button>\
                            </div>\
                        </div>\
                    </div>\
                    </div>\
              </div>');
            });

        });
    </script>

</body>
</html>

