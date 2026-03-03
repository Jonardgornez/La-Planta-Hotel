<?php
@include "includes/header.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
  header("location: table_appointment_reject.php");
  exit;
}

$id = (int)$_GET['id'];

$stmt = $conn->prepare("SELECT * FROM table_appointment WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows <= 0) {
  $_SESSION['error'] = "Appointment not found.";
  header("location: table_appointment_reject.php");
  exit;
}

$row = $result->fetch_assoc();

// Status label
switch ((int)$row['app_status']) {
  case 1:
    $STATUS = '<label class="btn bg-gradient-warning text-uppercase">Pending</label>';
    break;
  case 2:
    $STATUS = '<label class="btn bg-gradient-danger text-uppercase">Rejected</label>';
    break;
  case 3:
    $STATUS = '<label class="btn bg-gradient-success text-uppercase">Approved</label>';
    break;
  case 4:
    $STATUS = '<label class="btn bg-gradient-primary text-uppercase">Completed</label>';
    break;
  default:
    $STATUS = '<label class="btn bg-gradient-secondary text-uppercase">Unknown</label>';
}

/**
 * ✅ FIX IMAGE PATH
 * Your correct uploads folder:
 * http://localhost/La-Planta-Hotel/tableData/uploads/
 */
$base_upload_path = "http://localhost/La-Planta-Hotel/tableData/uploads/";
$filename = !empty($row['file_upload']) ? basename($row['file_upload']) : "";
$filePath = !empty($filename) ? ($base_upload_path . $filename) : "";
?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php @include "includes/navbar.php"; ?>
  <?php @include "includes/sidebar.php"; ?>

  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>APPOINTMENT DETAILS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">HOME</a></li>
              <li class="breadcrumb-item active">DETAILS</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?= $STATUS; ?></h3>

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

                <table class="table table-bordered">

                  <tr>
                    <th colspan="2" style="background:rgba(220, 221, 225,1.0);border-radius:3px" class="text-uppercase">
                      Personal Information
                    </th>
                  </tr>

                  <tr>
                    <td width="180">NAME</td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                  </tr>

                  <tr>
                    <td>EMAIL</td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                  </tr>

                  <tr>
                    <td>CONTACT NUMBER</td>
                    <td><?= htmlspecialchars($row['contact_number']); ?></td>
                  </tr>

                  <tr>
                    <th colspan="2" style="background:rgba(220, 221, 225,1.0);border-radius:3px" class="text-uppercase">
                      Booking Details
                    </th>
                  </tr>

                  <tr>
                    <td>BOOKING DATE</td>
                    <td><?= htmlspecialchars($row['booking_date']); ?></td>
                  </tr>

                  <tr>
                    <td>BOOKING TIME</td>
                    <td><?= htmlspecialchars($row['booking_time']); ?></td>
                  </tr>

                  <tr>
                    <td>NUMBER OF PEOPLE</td>
                    <td><?= (int)$row['number_of_people']; ?></td>
                  </tr>

                  <tr>
                    <td>PRICE</td>
                    <td><?= number_format((float)$row['price'], 2); ?></td>
                  </tr>

                  <tr>
                    <td>GCASH REFERENCE</td>
                    <td><?= !empty($row['gcashref_number']) ? htmlspecialchars($row['gcashref_number']) : 'N/A'; ?></td>
                  </tr>

                  <tr>
                    <td>DATE CREATED</td>
                    <td><?= htmlspecialchars($row['created_at']); ?></td>
                  </tr>

                  <tr>
                    <th colspan="2" style="background:rgba(220, 221, 225,1.0);border-radius:3px" class="text-uppercase">
                      Uploaded Image
                    </th>
                  </tr>

                  <tr>
                    <td>IMAGE</td>
                    <td>
                      <?php if (!empty($filePath)): ?>
                        <a href="<?= htmlspecialchars($filePath); ?>" target="_blank" title="Click to view full image">
                          <img src="<?= htmlspecialchars($filePath); ?>"
                               width="250"
                               class="img-thumbnail img-fluid mb-2"
                               alt="Uploaded Image">
                        </a>
                       
                      <?php else: ?>
                        No image uploaded.
                      <?php endif; ?>
                    </td>
                  </tr>

                </table>

              </div>

              <div class="card-footer text-muted">
                <a href="javascript:history.back()" class="btn btn-secondary btn-sm">
                  <i class="fa fa-arrow-left"></i> Back
                </a>
              </div>

            </div>

          </div>
        </div>
      </div>
    </section>

  </div>

  <?php @include "includes/footer.php"; ?>

</div>
</body>
</html>