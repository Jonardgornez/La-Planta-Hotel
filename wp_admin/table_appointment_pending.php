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
                    <th>BOOK DATE</th>
                    <th>PRICE</th>
                    <th>PAYMENT</th>
                    <th>BALANCE</th>
                    <th>GCASH REF. NO</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
				<?php
// Make sure you have already connected to the database
// Example:
// $conn = new mysqli("localhost", "username", "password", "resort_management");
// if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$stats = 1; // Change this to 0, 1, 2, 3 depending on the status you want to display

$queryForm = "SELECT * FROM table_appointment WHERE app_status = ? ORDER BY  created_at DESC";
$stmt = $conn->prepare($queryForm);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// Bind as integer since app_status is INT
$stmt->bind_param('i', $stats);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $cnt = 1;
        while ($row = $result->fetch_assoc()) {

            // Determine status label
            switch ($row['app_status']) {
                case 1:
                    $STATUS = '<label class="text-warning">Pending</label>';
                    break;
                case 2:
                    $STATUS = '<label class="text-danger">Rejected</label>'
                    ;
                    break;
                case 3:
                    $STATUS = '<label class="text-success">Approved</label>';
                    break;
                case 4:
                    $STATUS = '<label class="text-primary">Completed</label>';
                    break;
                default:
                    $STATUS = '<label class="text-secondary">Unknown</label>';
            }

            $price = $row['price'];
            $payment = $row['price'];  // You can adjust if payment logic changes
            $balance = $row['price'];  // Adjust if balance is different
            $name = $row['name'];
            $gcash = $row['gcashref_number'] ? $row['gcashref_number'] : '-';

            ?>
            <tr>
                <td><?=$cnt++;?></td>
                <td><?=$STATUS;?></td>
                <td><?=$name;?></td>
                <td><?=$row['booking_date'];?></td>
                <td><?=number_format($price, 2);?></td>
                <td><?=number_format($payment, 2);?></td>
                <td><?=number_format($balance, 2);?></td>
                <td><?=$gcash;?></td>
                <td align="right">
                    <div class="btn-group">
                        <button data-appid="<?=$row['id'];?>" onclick="myFunction(this);" class="btn btn-warning btn-sm text-white" data-jario="tooltip" data-placement="top" title="PAYMENT HISTORY">
                            <span class="fa fa-print"></span>
                        </button>
                        <button data-appid="<?=$row['id'];?>" data-balance="<?=$balance;?>" onclick="appPayment(this);" class="btn btn-info btn-sm" data-jario="tooltip" data-placement="top" title="PAYMENT">
                            <span class="fa fa-money-bill"></span>
                        </button>
                        <a href="appointment_information.php?appointment_information=<?=$row['id'];?>" class="btn btn-success btn-sm" data-jario="tooltip" data-placement="top" title="FULL INFORMATION">
                            <span class="fa fa-eye"></span>
                        </a>
                        <button data-appid="<?=$row['id'];?>" onclick="appApproved(this);" class="btn btn-primary btn-sm" data-jario="tooltip" data-placement="top" title="APPROVED">
                            <span class="fa fa-thumbs-up"></span>
                        </button>
                        <button data-appid="<?=$row['id'];?>" onclick="appReject(this);" class="btn btn-danger text-white btn-sm" data-jario="tooltip" data-placement="top" title="REJECT">
                            <span class="fa fa-thumbs-down"></span>
                        </button>
                    </div>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='9' class='text-center'>No records found.</td></tr>";
    }
} else {
    echo "Error executing query: " . $stmt->error;
}

$stmt->close();
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

<!-- <script type="text/javascript">
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
</script>  -->

<script type="text/javascript">
    function appApproved(self) {   // renamed typo: appAproved -> appApproved
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
      document.getElementById("pay_appid").value = appid;
      document.getElementById("pay_balance").value = balance;
      $("#payment_modal").modal("show");
    }

    $(document).on('keyup','#payment',function(){
        var pay_balance = Number.parseFloat($("#pay_balance").val());
        var payment = Number.parseFloat($("#payment").val());
        var TotalBalance = 0;

        $('#disabled').prop('disabled', true);
        if(payment > pay_balance){
            alert("Payment not greater than total balance");
            $('#disabled').prop('disabled', true);
        } else {
            TotalBalance = pay_balance - payment;
            document.getElementById("remain_balance").value = TotalBalance;
            $('#disabled').prop('disabled', false);
        }
    });

    function myFunction(self){
        var appid = self.getAttribute("data-appid");
        window.open("payment_history_print.php?appid=" + appid, "", "width=700,height=500");
    }
</script>

</body>
</html>

