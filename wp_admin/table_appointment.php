<?php include "includes/header.php"; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php include "includes/navbar.php"; ?>
<?php include "includes/sidebar.php"; ?>

<div class="content-wrapper">

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Approved Appointments</h1>
      </div>
    </div>
  </div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">

<?php
if(isset($_SESSION['error'])){
    echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
    unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
    echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
    unset($_SESSION['success']);
}
?>

<div class="card">
<div class="card-header">
  <h3 class="card-title">
    <i class="fa fa-calendar-alt"></i> List of Approved Appointments
  </h3>
</div>

<div class="card-body">
<table class="table table-bordered table-striped table-sm">
<thead>
<tr>
  <th>#</th>
  <th>Status</th>
  <th>Name</th>
  <th>Mobile</th>
  <th>Booking Date</th>
  <th>Booking Time</th>
  <th>People</th>
  <th>Price</th>
  <th>GCash Ref</th>
  <th>Created</th>
  <th>Action</th>
</tr>
</thead>
<tbody>

<?php
$APP_STATUS = 3; // Approved

$stmt = $conn->prepare("SELECT * FROM table_appointment WHERE app_status=? ORDER BY booking_date DESC");
$stmt->bind_param("i", $APP_STATUS);
$stmt->execute();
$result = $stmt->get_result();
$cnt = 1;

if($result->num_rows > 0){
while($row = $result->fetch_assoc()){

    if($row['app_status']==1){
        $STATUS='<span class="badge badge-warning">Pending</span>';
    }elseif($row['app_status']==2){
          $STATUS='<span class="badge badge-danger">Rejected</span>';
    }elseif($row['app_status']==3){
        $STATUS='<span class="badge badge-success">Approved</span>';
      
    }elseif($row['app_status']==4){
          $STATUS='<span class="badge badge-primary">Completed</span>';
    }
   

       $price = $row['price'];
            $payment = $row['downpayment'];  // You can adjust if payment logic changes
            $balance = $price - $payment; // Adjust if balance is different
            $name = $row['name'];
            $gcash = $row['gcashref_number'] ? $row['gcashref_number'] : '-';

?>
<tr>
<td><?=$cnt++;?></td>
<td><?=$STATUS;?></td>
<td><?=$row['name'];?></td>
<td><?=$row['contact_number'];?></td>
<td><?=$row['booking_date'];?></td>
<td><?=$row['booking_time'];?></td>
<td><?=$row['number_of_people'];?></td>
<td><?=number_format($row['price'],2);?></td>
<td><?=$row['gcashref_number'] ?: '-';?></td>
<td><?=$row['created_at'];?></td>
<td>
  <div class="btn-group" >
      <button 
      data-appid="<?=$row['id'];?>" onclick="myFunction(this);" class="btn btn-warning btn-sm text-white" data-jario="tooltip" data-placement="top" title="PAYMENT HISTORY">
                            <span class="fa fa-print"></span>
                        </button>
    <button style="margin-inline: 5px;"
    data-appid="<?=$row['id'];?>" 
        onclick="appCompleted(this);" 
        class="btn btn-primary btn-sm">
        Complete
    </button>

      <button style="margin-inline-end: 5px;"
      data-appid="<?=$row['id'];?>" data-balance="<?=$balance;?>" onclick="appPayment(this);" class="btn btn-info btn-sm" data-jario="tooltip" data-placement="top" title="PAYMENT">
                            <span class="fa fa-money-bill"></span>
                        </button>
     <a href="table_appointment_infomation.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm" data-jario="tooltip" data-placement="top" title="FULL INFORMATION">
                            <span class="fa fa-eye"></span>
                        </a>
                        
  </div>
</td>
</tr>
<?php
}
}else{
echo "<tr><td colspan='11' class='text-center'>No records found</td></tr>";
}
$stmt->close();
?>

</tbody>
</table>
</div>
</div>

</div>
</div>
</div>
</section>
</div>

<?php include "includes/table_appointment_modal.php"; ?>
<?php include "includes/footer.php"; ?>

<script>
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

function appCompleted(self){
    var appid = self.getAttribute("data-appid");
    document.getElementById("appcompleted_appid").value = appid;
    $("#complete_modal").modal("show");
}

 function myFunction(self){
        var appid = self.getAttribute("data-appid");
        window.open("table_payment_history_print.php?appid=" + appid, "", "width=700,height=500");
    }
</script>

</body>
</html>