<?php include "includes/header.php"; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php @include "includes/navbar.php"; ?>
<?php @include "includes/sidebar.php"; ?>

<div class="content-wrapper">

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Rejected Appointments</h1>
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
    <i class="fa fa-calendar-alt"></i>
    List of Rejected
  </h3>
</div>

<div class="card-body">

<table class="table table-bordered table-striped table-sm">
<thead>
<tr>
  <th>#</th>
  <th>Status</th>
  <th>Name</th>
  <th>Contact</th>
  <th>Booking Date</th>
  <th>Booking Time</th>
  <th>People</th>
  <th>Price</th>
  <th>GCash Ref</th>
  <th>Date Created</th>
  <th>Actions</th>
</tr>
</thead>

<tbody>

<?php
$stats = 2; // 2 = Rejected

$stmt = $conn->prepare("SELECT * FROM table_appointment WHERE app_status=? ORDER BY booking_date DESC");
$stmt->bind_param("i", $stats);

if($stmt->execute()){
  $result = $stmt->get_result();
  $cnt = 1;

  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){

      switch($row['app_status']){
        case 1:
          $STATUS = '<span class="badge badge-warning">Pending</span>';
          break;
        case 2:
           $STATUS = '<span class="badge badge-danger">Rejected</span>';
        
          break;
        case 3:
            $STATUS = '<span class="badge badge-success">Approved</span>';
         
          break;
        case 4:
         $STATUS = '<span class="badge badge-primary">Completed</span>';
          break;
        default:
          $STATUS = '<span class="badge badge-secondary">Unknown</span>';
      }
?>

<tr>
  <td><?= $cnt++; ?></td>
  <td><?= $STATUS; ?></td>
  <td><?= $row['name']; ?></td>
  <td><?= $row['contact_number']; ?></td>
  <td><?= $row['booking_date']; ?></td>
  <td><?= $row['booking_time']; ?></td>
  <td><?= $row['number_of_people']; ?></td>
  <td><?= number_format($row['price'],2); ?></td>
  <td><?= $row['gcashref_number'] ? $row['gcashref_number'] : '-'; ?></td>
  <td><?= $row['created_at']; ?></td>
  <td>
    <div class="btn-group">

      <button data-appid="<?= $row['id']; ?>"
              onclick="printHistory(this);"
              class="btn btn-warning btn-sm">
        <span class="fa fa-print"></span>
      </button>

      <button data-appid="<?= $row['id']; ?>"
              data-balance="<?= $row['price']; ?>"
              onclick="openPayment(this);"
              class="btn btn-info btn-sm">
        <span class="fa fa-money-bill"></span>
      </button>

      <a href="table_appointment_infomation.php?id=<?= $row['id']; ?>"
         class="btn btn-success btn-sm">
        <span class="fa fa-eye"></span>
      </a>

    </div>
  </td>
</tr>

<?php
    }
  } else {
    echo "<tr><td colspan='11' class='text-center'>No rejected appointments found.</td></tr>";
  }
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

<?php 
@include "includes/footer.php";
@include "includes/table_appointment_modal.php"; 
?>

<script>

function openPayment(self){
  var appid = self.getAttribute("data-appid");
  var balance = self.getAttribute("data-balance");

  document.getElementById("pay_appid").value = appid;
  document.getElementById("pay_balance").value = balance;

  $("#payment_modal").modal("show");
}

function printHistory(self){
  var appid = self.getAttribute("data-appid");
  window.open("payment_history_print.php?appid="+appid,"","width=700,height=500");
}

$(document).on('keyup','#payment',function(){
  var pay_balance = parseFloat($("#pay_balance").val()) || 0;
  var payment = parseFloat($("#payment").val()) || 0;

  if(payment > pay_balance){
    alert("Payment cannot be greater than total balance.");
    $('#disabled').prop('disabled', true);
  } else {
    var remain = pay_balance - payment;
    $("#remain_balance").val(remain);
    $('#disabled').prop('disabled', false);
  }
});

</script>

</body>
</html>