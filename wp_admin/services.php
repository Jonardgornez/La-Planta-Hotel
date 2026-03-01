<?php @include "includes/header.php"; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- .navbar -->
  <?php @include "includes/navbar.php"; ?>
  <!-- /.navbar -->
  <?php @include "includes/sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Service Schedule</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Service</li>
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
                <div class='alert alert-danger' id='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-warning'></i> ERROR!</h4>
                  ".$_SESSION['error']."
                </div>
                ";
                unset($_SESSION['error']);
              }

              if(isset($_SESSION['success'])){
                echo "
                <div class='alert alert-success' id='alert'>
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
                  <a href="#new_services" data-toggle="modal" class="btn btn-primary btn-sm <?=$YES_ADD;?>">
                    <i class="fa fa-user-plus"></i> NEW
                  </a>

                  <button data-target="#ServiceDesc" data-toggle="modal" class="btn btn-primary btn-sm" <?=$YES_EDIT;?>>
                    <span class="fa fa-pen"></span> SERVICE DESCRIPTION
                  </button>
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
                      <th>DAY</th>
                      <th>TIME</th>
                      <th>DESCRIPTION</th>
                      <th>ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      date_default_timezone_set('Asia/Manila');

                      $sql = "SELECT * FROM tbl_services";
                      $query = $conn->query($sql);
                      $cnt = 1;

                      while($row = $query->fetch_assoc()){
                        $service_id   = $row['SERVICE_ID'];
                        $from_day     = $row['SERVICE_FROM_DAY'];
                        $end_day      = $row['SERVICE_END_DAY'];
                        $start_time   = $row['SERVICE_START'];
                        $end_time     = $row['SERVICE_END'];
                        $desc         = $row['SERVICE_DESC'];

                        // Avoid undefined index if SERVICE_TYPE doesn't exist
                        $service_type = isset($row['SERVICE_TYPE']) ? $row['SERVICE_TYPE'] : '';
                    ?>
                    <tr>
                      <td><?= $cnt++; ?></td>
                      <td><?= $from_day . ' - ' . $end_day; ?></td>
                      <td><?= date('h:i A', strtotime($start_time)) . ' - ' . date('h:i A', strtotime($end_time)); ?></td>
                      <td><?= $desc; ?></td>
                      <td align="right">
                        <div class="btn-group">

                          <button class="btn btn-primary btn-sm"
                            data-serid="<?= $service_id; ?>"
                            data-fromday="<?= htmlspecialchars($from_day, ENT_QUOTES); ?>"
                            data-endday="<?= htmlspecialchars($end_day, ENT_QUOTES); ?>"
                            data-desc="<?= htmlspecialchars($desc, ENT_QUOTES); ?>"
                            data-starttime="<?= $start_time; ?>"
                            data-endtime="<?= $end_time; ?>"
                            onclick="editCot(this);"
                            data-toggle="tooltip" data-placement="top" title="EDIT" <?= $YES_EDIT; ?>>
                            <i class="fa-solid fa fa-edit"></i>
                          </button>

                          <button class="btn btn-danger btn-sm"
                            data-serviceid="<?= $service_id; ?>"
                            data-cotname="<?= htmlspecialchars($service_type, ENT_QUOTES); ?>"
                            onclick="deleteCot(this);"
                            data-toggle="tooltip" data-placement="top" title="DELETE" <?= $YES_DELETE; ?>>
                            <i class="fa-solid fa fa-trash"></i>
                          </button>

                        </div>
                      </td>
                    </tr>
                    <?php } ?>
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

  <?php include "includes/services_modal.php"; ?>
  <?php include "includes/footer.php"; ?>

  <script type="text/javascript">
    function editCot(self) {
      var serid = self.getAttribute("data-serid");
      var fromday = self.getAttribute("data-fromday");
      var endday = self.getAttribute("data-endday"); // fixed name
      var desc = self.getAttribute("data-desc");
      var starttime = self.getAttribute("data-starttime");
      var endtime = self.getAttribute("data-endtime");

      document.getElementsByClassName("edit_serid")[0].value = serid;
      document.getElementsByClassName("edit_fromday")[0].innerHTML = fromday;
      document.getElementsByClassName("edit_endday")[0].innerHTML = endday;
      document.getElementsByClassName("edit_desc")[0].value = desc;
      document.getElementsByClassName("edit_starttime")[0].value = starttime;
      document.getElementsByClassName("edit_endtime")[0].value = endtime;

      $("#ediTime_modal").modal("show");
    }

    function deleteCot(self) {
      var serviceid = self.getAttribute("data-serviceid");
      document.getElementsByClassName("del_serviceid")[0].value = serviceid;
      $("#service_del_modal").modal("show");
    }
  </script>

</body>
</html>