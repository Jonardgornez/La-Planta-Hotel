<?php include "includes/header.php";?>
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
            <h1>Pending </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pending</li>
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
              <i class="fa fa-calendar-alt"></i>
              List of Pending
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
                <table id="example1" class="table table-bordered table-striped table-hover table-sm">
                  <thead>
                  <tr>
                    <th>#</th> 
                    <th>STATUS</th>
					<th>NAME</th>
                    <th>MOBILE</th>
                    <th>BOOK DATE</th>
                    <th>PRICE</th>
                    <th>PAYMENT</th>
                    <th>BALANCE</th>
                    <th>STATUS</th>
                    <th>GCASH REF. NO</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
				<?php
                  $stats=0;
				  $stmt=$conn->prepare("SELECT * FROM tbl_appointment WHERE APP_STATUS=? ORDER BY BOOK_DATE DESC");
                  $stmt->bind_param('s',$stats);
                  if($stmt->execute()){
                    
				          	$cnt=1;
                    $result=$stmt->get_result();
                    if($result->num_rows >0){
                    while($row = $result->fetch_assoc()){
                     

                      if($row['APP_STATUS']==0){
                        $STATUS='<label class="text-warning">Pending</label>';
                       }elseif($row['APP_STATUS']==1){
                         $STATUS='<label class="text-success">Approved</label>';
                       }elseif($row['APP_STATUS']==2){
                        $STATUS='<label class="text-primary">Completed</label>';
                       }elseif($row['APP_STATUS']==3){
                         $STATUS='<label class="text-danger">Rejected</label>';
                       }
					   
                      $price=$row['COT_PRICE'];
                      $payment=$row['DOWN_PAYMENT'];
                      $balance=$row['BALANCE'];
                      ?>
                        <tr>
                          <td><?=$cnt++; ?></td>
                          <td><?=$STATUS;?></td>
						              <td style="font-size:10pt">
                          <label for=""><a href="appointment_receipt.php?refnumber=<?=$row['AUTO_NUMBER'];?>" data-jario="tooltip" data-placement="top" title="PRINT RECEIPT">
                              [<?=$row['AUTO_NUMBER']; ?>] <?=$row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MIDDLENAME'];?>
                            </a></label>
                          </td>
                          <td><?=$row['MOBILE']; ?></td>
                          <td><?=$row['BOOK_DATE']; ?></td>
                          <td><?=number_format($price,2); ?></td>
                          <td><?=number_format($payment,2); ?></td>
                          <td><?=number_format($balance,2); ?></td>
                          <td><?=$row['PAYMENT_STATUS']; ?></td>
                          <td><?=$row['PAYMENT_REF_NO']; ?></td>
                          <td align="right">
                          <div class="btn-group">
                          <button data-appid="<?=$row['APP_ID'];?>" onclick="myFunction(this);" class="btn btn-warning btn-sm text-white" data-jario="tooltip" data-placement="top" title="PAYMENT HISTORY"> <span class="fa fa-print"></span></button>
						              <button data-appid="<?=$row['APP_ID'];?>" data-balance="<?=$balance;?>" data-cotid="<?=$row['COT_ID'];?>" onclick="appPayment(this);" class="btn btn-info btn-sm" data-jario="tooltip" data-placement="top" title="PAYMENT" <?=$YES_APPROVED;?>> <span class="fa fa-money-bill"></span></button>
                          <a href="appointment_information.php?appointment_information=<?=$row['APP_ID'];?>" class="btn btn-success btn-sm" data-jario="tooltip" data-placement="top" title="FULL INFORMATION"> <span class="fa fa-eye"></span></a>
                          <button data-appid="<?=$row['APP_ID'];?>" onclick="appAproved(this);" class="btn btn-primary btn-sm" data-jario="tooltip" data-placement="top" title="APPROVED" <?=$YES_APPROVED;?>> <span class="fa fa-thumbs-up"></span></button>
                          <button data-appid="<?=$row['APP_ID']?>" onclick="appReject(this);" class="btn btn-danger text-white btn-sm" data-jario="tooltip" data-placement="top" title="REJECT" <?=$YES_REJECTED;?>> <span class="fa fa-thumbs-down"></span></button>
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

 <?php 
 @include "includes/appointment_modal.php"; 
 @include "includes/footer.php";?>

<script type="text/javascript">
    function appAproved(self) {
      var appid = self.getAttribute("data-appid");
      document.getElementById("approved_appid").value = appid;
      $("#approved_modal").modal("show");
    }
    function appReject(self) {
      var appid = self.getAttribute("data-appid");
      document.getElementById("appreject_appid").value = appid;
      $("#rejected_modal").modal("show");
  }
  
   function appPayment(self) {
      var appid = self.getAttribute("data-appid");
      var balance = self.getAttribute("data-balance");
      var cotid = self.getAttribute("data-cotid");
      document.getElementById("pay_appid").value = appid;
      document.getElementById("pay_balance").value = balance;
      document.getElementById("pay_cotid").value = cotid;
      $("#payment_modal").modal("show");
  }
  $(document).on('keyup','#payment',function(){
		var pay_balance =Number.parseFloat($("#pay_balance").val());
		var payment =Number.parseFloat($("#payment").val());
		var TotalBalance=0;
	
		$('#disabled').prop('disabled', true);
		if(payment>pay_balance){
			alert("Payment not greater than total balance");
			$('#disabled').prop('disabled', true);
		}else if(payment>=pay_balance){
			TotalBalance =pay_balance - payment;
			document.getElementById("remain_balance").value = TotalBalance;
			$('#disabled').prop('disabled', false);
		}else if(payment<pay_balance){
			TotalBalance =pay_balance - payment;
			document.getElementById("remain_balance").value = TotalBalance;
			$('#disabled').prop('disabled', false);
		}
	});

  function myFunction(self){
           var appid = self.getAttribute("data-appid");
           window.open("payment_history_print.php?appid="+appid, "", "width=700,height=500");
        }
</script> 
</body>
</html>

