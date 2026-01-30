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
            <h1>Inquiry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inquiry</li>
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
                  <i class="fas fa-envelope"></i> Messages
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>MESSAGE</th>
                    <th>DATE</th>
                    <th>ACTIONS</th>
                  </tr>
                  </thead>
                  <tbody>
				        	<?php
                    $stmt=$conn->prepare("SELECT * FROM tbl_contact_us ORDER BY C_DATE DESC");
                    if($stmt->execute()){
				        	  $cnt=1;
                    $result=$stmt->get_result();
                    if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?=$cnt++; ?></td>
                          <td><?=$row['C_NAME']; ?></td>
                          <td><?=$row['C_EMAIL']; ?></td>
                          <td><?=$row['C_PHONE']; ?></td>
                          <td><?=$row['C_MESSAGE']; ?></td>
                          <td><?=$row['C_DATE']; ?></td>
                          <td align="right">
                          <div class="btn-group">
                            <button data-cid="<?=$row['C_ID'];?>" data-message="<?=$row['C_MESSAGE'];?>" data-name="<?=$row['C_NAME'];?>" onclick="delCotactn(this);"  class="btn bg-maroon btn-sm delete" <?php print $YES_DELETE;?>><i class="fa-solid fa fa-trash"></i> </button>
                           </div>
                          </td>
                        </tr>
                      <?php
                    }
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
  <?php include "includes/contact_us_modal.php";?>
 <?php include "includes/footer.php";?>

 <script>
  function delCotactn(self){
    var cid=self.getAttribute("data-cid");
    var message=self.getAttribute("data-message");
    var name=self.getAttribute("data-name");
    document.getElementById("del_cid").value=cid;
    document.getElementById("del_message").innerHTML=message;
    document.getElementById("del_name").innerHTML=name;
    $("#del_modal").modal("show");
  }

</script> 
</body>
</html>

