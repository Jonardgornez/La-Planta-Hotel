<?php include "includes/header.php";?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- .navbar -->
  <?php include "includes/navbar.php";?>
  <!-- /.navbar -->
  <?php include "includes/sidebar.php";?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">DASHBOARD</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">HOME</a></li>
              <li class="breadcrumb-item active">DASHBOARD</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php
                $Total_Revenue=0;
                $sql = "SELECT *,SUM(c.COT_PRICE) as Total_Revenue FROM tbl_appointment a INNER JOIN tbl_cottage c ON a.COT_ID=c.COT_ID WHERE a.APP_STATUS=1 OR a.APP_STATUS=2";
                $sql=$conn->prepare($sql);
                $sql->execute();
                $result = $sql->get_result();
                $revenue_rows=$result->fetch_assoc();
                $Total_Revenue=$revenue_rows['Total_Revenue'];
                echo "<h3> &#x20B1;".number_format($Total_Revenue, 2)."</h3>";
              ?>
                <p>REVENUE </p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <!-- <a href="appointment_pending.php?home=appointment_pending" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
                $sql = "SELECT * FROM tbl_appointment WHERE APP_STATUS=3;";
                $sql=$conn->prepare($sql);
                $sql->execute();
                $result = $sql->get_result();
                echo "<h3>".$result->num_rows."</h3>";
              ?>
                <p>REJECTED</p>
              </div>
              <div class="icon">
                <i class="ion ion-thumbsdown"></i>
              </div>
              <!-- <a href="appointment_rejected.php?home=appointment_rejected" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-maroon">
              <div class="inner">
              <?php
                $sql = "SELECT * FROM tbl_appointment WHERE APP_STATUS=1;";
                $sql=$conn->prepare($sql);
                $sql->execute();
                $result = $sql->get_result();
                echo "<h3>".$result->num_rows."</h3>";
              ?>
                <p>APPROVED</p>
              </div>
              <div class="icon">
                <i class="ion ion-thumbsup"></i>
              </div>
              <!-- <a href="appointment.php?home=appointment_approved" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php
                $sql = "SELECT * FROM tbl_appointment WHERE APP_STATUS=2;";
                $sql=$conn->prepare($sql);
                $sql->execute();
                $result = $sql->get_result();
                echo "<h3>".$result->num_rows."</h3>";
              ?>
                <p> COMPLETED</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <!-- <a href="appointment_completed.php?home=appointment_completed" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
    

        </div>
        <!-- /.row -->
        <!-- Main row -->
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
        <div class="row">
        <section class="col-lg-8 connectedSortable">
			 <!-- Default box -->
			  <div class="card">
				<div class="card-header">
				  <h3 class="card-title">REMINDERS</h3>

				  <div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					  <i class="fas fa-minus"></i>
					</button>
					<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
					  <i class="fas fa-times"></i>
					</button>
				  </div>
				</div>
				<div class="card-body">
      <div id="calendar"></div>
        
			<!-- Event Details Modal -->
			
			
				<div class="modal fade" id="event-details-modal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
							<h5 class="modal-title"><span class="fa fa-question-circle"></span> Schedule Details</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
							   <dl>
								<dt class="text-muted">Title</dt>
								<dd id="title" class="fw-bold fs-4"></dd>
								<dt class="text-muted">Description</dt>
								<dd id="description" class=""></dd>
								<dt class="text-muted">Start</dt>
								<dd id="start" class=""></dd>
								<dt class="text-muted">End</dt>
								<dd id="end" class=""></dd>
							</dl>
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary btn-sm" id="edit" data-id=""> <i class="fa fa-edit"></i> EDIT</button>
								<!-- <button type="button" class="btn btn-danger btn-sm" id="delete" data-id=""> <i class="fa-solid fa fa-trash"></i> Delete</button> -->
								 <!-- <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"> <i class="fa-solid fa fa-times"></i> CLOSE</button> -->
							</div>
						</div>
					</div>
				</div>

				<!-- Event Details Modal -->

			<?php 
			$schedules = $conn->query("SELECT * FROM `schedule_list`");
			$sched_res = [];
			foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
				$row['sdate'] = date("F d, Y H:i A",strtotime($row['start_datetime']));
				$row['edate'] = date("F d, Y H:i A",strtotime($row['end_datetime']));
				$sched_res[$row['id']] = $row;
			}
			?>
			<?php 
			if(isset($conn)) $conn->close();
			?>
				  
				  
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
				  
				</div>
				<!-- /.card-footer-->
			  </div>
      <!-- /.card -->
          </section>
		  <section class="col-lg-4 connectedSortable">
			 <!-- Default box -->
			  <div class="card">
				<div class="card-header">
				  <h3 class="card-title">REMINDERS</h3>

				  <div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					  <i class="fas fa-minus"></i>
					</button>
					<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
					  <i class="fas fa-times"></i>
					</button>
				  </div>
				</div>
				<form action="notes_update.php" method="post" id="schedule-form">
				<div class="card-body">
					
					<input type="hidden" name="id" value="">
					<div class="form-group">
						<label for="title" class="control-label">Title</label>
						<input type="text" class="form-control" name="title" id="title" required>
					</div>
					<div class="form-group">
						<label for="description" class="control-label">Description</label>
						<textarea rows="3" class="form-control" name="description" id="description" required></textarea>
					</div>
					<div class="form-group">
						<label for="start_datetime" class="control-label">Start</label>
						<input type="datetime-local" class="form-control" name="start_datetime" id="start_datetime" required>
					</div>
					<div class="form-group">
						<label for="end_datetime" class="control-label">End</label>
						<input type="datetime-local" class="form-control" name="end_datetime" id="end_datetime" required>
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
				  <button class="btn btn-primary btn-sm" type="submit" form="schedule-form"><i class="fa fa-save"></i> SAVE</button>
                   <button class="btn btn-default border btn-sm" type="reset" form="schedule-form"><i class="fa fa-reset"></i> CANCEL</button>
				</div>
				</form>
				<!-- /.card-footer-->
			  </div>
      <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "includes/footer.php";?>
  <script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
	</script>
  <script src="../plugins/fullcalendar/js/script.js"></script>
</body>
</html>


 
