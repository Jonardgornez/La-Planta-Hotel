<?php include "includes/header.php";?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php @include "includes/navbar.php";?>
<?php @include "includes/sidebar.php";?>

<div class="content-wrapper">

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Completed</h1>
      </div>
    </div>
  </div>
</section>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">

<div class="card">
<div class="card-header">
<h3 class="card-title">
<i class="fa fa-calendar-alt"></i>
List of Completed Appointments
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
<th>Price</th>
<th>GCash Ref</th>
<th>Date Created</th>
<th>Info</th>
</tr>
</thead>
<tbody>

<?php
$stats = 4; // 4 = Completed

$stmt = $conn->prepare("SELECT * FROM table_appointment WHERE app_status=? ORDER BY booking_date DESC");
$stmt->bind_param('i', $stats);

if($stmt->execute()){
    $result = $stmt->get_result();
    $cnt = 1;

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){

            $STATUS = '<label class="text-primary">Completed</label>';

            $price = $row['price'];
            $gcash = $row['gcashref_number'] ? $row['gcashref_number'] : '-';
?>

<tr>
<td><?=$cnt++;?></td>
<td><?=$STATUS;?></td>
<td><?=$row['name'];?></td>
<td><?=$row['contact_number'];?></td>
<td><?=$row['booking_date'];?></td>
<td><?=number_format($price,2);?></td>
<td><?=$gcash;?></td>
<td><?=$row['created_at'];?></td>
<td>
  <div class="btn-group">
    <button data-appid="<?=$row['id'];?>" onclick="myFunction(this);" class="btn btn-warning btn-sm">
      <span class="fa fa-print"></span>
    </button>

    <a href="appointment_information.php?appointment_information=<?=$row['id'];?>" 
       class="btn btn-success btn-sm">
       <span class="fa fa-eye"></span>
    </a>
  </div>
</td>
</tr>

<?php
        }
    } else {
        echo "<tr><td colspan='9' class='text-center'>No completed appointments found.</td></tr>";
    }
}
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

<?php @include "includes/footer.php";?>

<script>
function myFunction(self){
    var appid = self.getAttribute("data-appid");
    window.open("payment_history_print.php?appid="+appid, "", "width=700,height=500");
}
</script>

</body>
</html>