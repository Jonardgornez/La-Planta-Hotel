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
            <h1>Advisory</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advisory</li>
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
             <h3 class="card-title"> 
              <a href="#add_news" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> NEW</a>
            </h3>
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
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>DATE</th>
                    <th>POSTED BY</th>
                    <th>ACTIONS</th>
                  </tr>
                  </thead>
                  <tbody>
				    <?php
                    $sql = "SELECT * FROM tbl_advisories a LEFT JOIN tbl_users u ON a.USERID=u.ID ORDER BY NEWSDATE DESC";
                    $query = $conn->query($sql);
                    $cnt=1;
                    while($row = $query->fetch_assoc()){
                       
                        ?>
                        <tr>
                            <td><?=$cnt++; ?></td>
                            <td><?=$row['NEWSNAME']; ?></td>
                            <td><?=$row['NEWSDESCRIPTION']; ?></td>
                            <td><?=$row['NEWSDATE']; ?></td>
                            <td><?=$row['LASTNAME']; ?></td>
                            <td align="right">
                            <div class="btn-group">
                              <button class="btn btn-primary btn-sm"
                              data-newsid="<?=$row['NEWSID'];?>" 
                              data-newsname="<?=$row['NEWSNAME'];?>"
                              data-newsdescription="<?=$row['NEWSDESCRIPTION'];?>"
                              onclick="editNews(this);" data-jario="tooltip" data-placement="top" title="EDIT">
                              <i class="fa-solid fa fa-edit"></i>
                              </button>
                              <button class="btn btn-danger btn-sm" 
                              data-newsid="<?=$row['NEWSID'];?>" data-newsname="<?=$row['NEWSNAME'];?>"
                              onclick="deleteNews(this);" data-jario="tooltip" data-placement="top" title="DELETE">
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
  <?php include "includes/news_modal.php";?>
 <?php include "includes/footer.php";?>

 <script type="text/javascript">
 function editNews(self) {
      var newsid = self.getAttribute("data-newsid");
      var newsname = self.getAttribute("data-newsname");
      var newsdescription = self.getAttribute("data-newsdescription");
      document.getElementsByClassName("edit_newsid")[0].value= newsid;
      document.getElementsByClassName("edit_newsname")[0].value= newsname;
      document.getElementsByClassName("edit_newsdescription")[0].value= newsdescription;
      $("#news_edit_modal").modal("show");
    }

    function deleteNews(self) {
      var newsid = self.getAttribute("data-newsid");
      var newsname = self.getAttribute("data-newsname");
      document.getElementsByClassName("del_newsid")[0].value = newsid;
      document.getElementsByClassName("del_newsname")[0].innerHTML = newsname;
      $("#news_del_modal").modal("show");
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

