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
  <div class="btn-group">
    <button data-appid="<?=$row['id'];?>" 
        onclick="appCompleted(this);" 
        class="btn btn-primary btn-sm">
        Complete
    </button>
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
function appCompleted(self){
    var appid = self.getAttribute("data-appid");
    document.getElementById("appcompleted_appid").value = appid;
    $("#complete_modal").modal("show");
}
</script>

</body>
</html>