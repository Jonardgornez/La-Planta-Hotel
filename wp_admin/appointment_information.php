<?php @include "includes/header.php";
if(!empty($_GET['appointment_information'])){

  $stmt =$conn->prepare("SELECT * FROM tbl_appointment WHERE APP_ID=?");
  $stmt->bind_param('s',$_GET['appointment_information']);
  if($stmt->execute()){
	$result = $stmt->get_result();
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
    $RECORD_NUMBER    =$row['AUTO_NUMBER'];
		$MEMBERS          =$row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MIDDLENAME'];
		$GENDER   			  =$row['GENDER'];
		$DATE_OF_BIRTH    =$row['DATE_OF_BIRTH'];
    $AGE  	          =$row['AGE'];
    $MOBILE           =$row['MOBILE'];
		$ADDRESS				  =$row['ADDRESS'];
    $VALID_ID_NUMBER                =$row['VALID_ID_NUMBER'];
    $UPLOAD_ID                      =$row['UPLOAD_ID'];
    $UPLOAD_WITH_SELFIE             =$row['UPLOAD_WITH_SELFIE'];
    $BOOK_DATE           =$row['BOOK_DATE'];
    $BOOK_TIME           =$row['BOOK_TIME'];
    if($row['APP_STATUS']==0){
      $STATUS='<label class="btn bg-gradient-warning text-uppercase"> Pending</label>';
    }elseif($row['APP_STATUS']==1){
      $STATUS='<label class="btn bg-gradient-success text-uppercase">Approved</label>';
    }elseif($row['APP_STATUS']==2){
      $STATUS='<label class="btn bg-gradient-primary text-uppercase">Completed</label>';
    }elseif($row['APP_STATUS']==3){
      $STATUS='<label class="btn bg-gradient-danger text-uppercase">Rejected</label>';
    }

    $stmt=$conn->prepare("SELECT * FROM tbl_cottage WHERE COT_ID=?");
    $stmt->bind_param('s',$row['COT_ID']);
    $stmt->execute();
    $cottage_query = $stmt->get_result();
    $cot_rows=$cottage_query->fetch_assoc();
    $COT_NUMBER=$cot_rows['COT_NUMBER'];
    $COT_NAME=$cot_rows['COT_NAME'];
    $COT_DESCRIPTION=$cot_rows['COT_DESCRIPTION'];
    $COT_PRICE=$cot_rows['COT_PRICE'];
    $COT_NUM_GUEST=$cot_rows['COT_NUM_GUEST'];
    $COT_INCLUSION=$cot_rows['COT_INCLUSION'];
    $COT_IMAGE=$cot_rows['COT_IMAGE'];
	}else{
	  header("location:appointment_pending.php?home=appointment_pending");
	}

}
}
?>
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
            <h1>RESERVATION DETAILS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">HOME</a></li>
              <li class="breadcrumb-item active">PROFILE</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
	 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <h3 class="card-title"><?=$STATUS;?></h3>
              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
             
                <table class="table table-bordered">
                  <tr>
                  <th colspan="2" style="background:rgba(220, 221, 225,1.0);border-radius:3px" class="text-uppercase">Personal Information</th>
                  </tr>
                  <tr>
                    <td width="180">NAME</td>
                    <td width="400"><?=$MEMBERS;?></td>
                  </tr>
				            <tr>
                    <td>GENDER</td>
                    <td><?=$GENDER;?></td>
                  </tr>
                  <tr>
                    <td>DATE OF BIRTH</td>
                    <td>
                    <?php
                      if($DATE_OF_BIRTH==""){
                        echo 'N/A';
                      }else{
                        echo date('l dS \o\f F Y',strtotime($DATE_OF_BIRTH));
                      }
                    ?>

                  </td>
                  </tr>
                  <tr>
                    <td>AGE</td>
                    <td><?=$AGE;?></td>
                  </tr>
				            <tr>
                    <td>MOBILE </td>
                    <td><?=$MOBILE;?></td>
                  </tr>
                  <tr>
                    <td> ADDRESS</td>
                    <td><?=$ADDRESS;?></td>
                  </tr>
                  
                  
				          <tr>
                    <th colspan="2" style="background:rgba(220, 221, 225,1.0);border-radius:3px"> PROF OF IDENTITY
                    </th>
                  </tr>
				          <tr>
                    <td>VALID ID</td>
                    <td><?=$VALID_ID_NUMBER;?> </td>
                  </tr>
				          <tr>
                    <td>UPLOADED ID</td>
                    <td>
                      <a href="data:image/jpg;charset=utf8;base64,<?=base64_encode($UPLOAD_ID); ?>" data-toggle="lightbox" data-title="<?=$VALID_ID_NUMBER;?>" data-gallery="gallery" width="500">
                      <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($UPLOAD_ID); ?>" width="100" height="100" class="img-thumbnail img-fluid mb-2">
                    </a>
                    </td>
                  </tr>
				          <tr>
                    <td>VALID ID WITH SELFIE</td>
                    <td>
                    <a href="data:image/jpg;charset=utf8;base64,<?=base64_encode($UPLOAD_WITH_SELFIE); ?>" data-toggle="lightbox" data-title="<?=$VALID_ID_NUMBER;?>" data-gallery="gallery" width="500">
                      <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($UPLOAD_WITH_SELFIE); ?>" width="100" height="100" class="img-thumbnail img-fluid mb-2">
                    </a>
					          </td>
                  </tr>
                  <tr>
                    <th colspan="2" style="background:rgba(220, 221, 225,1.0);border-radius:3px"> COTTAGE DETAILS</th>
                    
                  </tr>
                  <tr>
                    <td>
                      REFERENCE NO: <?=$RECORD_NUMBER;?><br>
                      COTTAGE NO:<?=$COT_NUMBER;?><br>
                      NAME: <?=$COT_NAME;?><br>
                      PRICE: <?=$COT_PRICE;?><br>
                      NO OF GUEST:<?=$COT_NUM_GUEST;?><br>
                      INCLUSION: <?=$COT_INCLUSION;?><br>
                    </td>
                      <td>
                      <a href="data:image/jpg;charset=utf8;base64,<?=base64_encode($COT_IMAGE); ?>" data-toggle="lightbox" data-title="<?=$COT_NUMBER;?>" data-gallery="gallery" width="500">
                      <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($COT_IMAGE); ?>" width="100" height="100" class="img-thumbnail img-fluid mb-2">
                    </a>
                      </td>
                  </tr>
                </table>
              </div><!-- /.card-body -->
              <div class="card-footer text-muted">
              <div class="float-right">
          </div>
          	</div>
            </div>
            <!-- /.card -->
            
          </div>
		  
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
	
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="baptised">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
			<h4 class="modal-title"> <span class="fa-solid fa fa-user"></span> Change Photo</h4>
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="member_profile_update.php" enctype="multipart/form-data">
				    <div class="row">
				    <div class="col-md-12">
                <div class="form-group">
                <input type="hidden" class="form-control" value="<?=$ID;?>" name="ID">
                <input type="hidden" class="form-control" name="member_info" value="<?=$ID;?>" required>
                <input type="hidden" class="form-control" name="record" value="<?=$row['RECORD_NUMBER'];?>" required>
                <input type="hidden" class="form-control" name="name" value="<?=str_replace(' ','_',$row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MIDDLENAME']); ?>" required>
                    <label for="photo" class="control-label">Photo:</label>
                    <input class="form-control" name="image" type="file" id="formFileBaptised" onchange="previeww()"><br>
                   <img id="frameBaptised" src="" class="img-fluid " style="border-radius:10px">
                </div>
                </div>
               
               </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn bg-primary btn-sm" name="upload"><i class="fa fa-check-square-o"></i> Submit</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- Add -->
<div class="modal fade update_identity">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-plus"></span>UPLOAD VALID ID</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<form class="form-horizontal needs-validation" action="member_prof_identity_update.php" method="POST" onSubmit="return valid();" enctype="multipart/form-data" novalidate>
          	<div class="modal-body">
          		<div class="row">
						<input type="hidden" class="form-control" name="member_info" value="<?=$ID;?>" required>
            <input type="hidden" class="form-control" name="record" value="<?=$row['RECORD_NUMBER'];?>" required>
            <input type="hidden" class="form-control" name="name" value="<?=str_replace(' ','_',$row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MIDDLENAME']); ?>" required>
            <div class="col-lg-12">
						<div class="form-group">
						<label class="font-weight-normal">Lists of Valid ID</label>
						  <select style="width:100%" class="form-control select2 text-uppercase" name="VALID_ID_NUMBER" required>
							<option value="<?=$VALID_ID_NUMBER;?>" selected><?=$VALID_ID_NUMBER;?></option>
							<option>Philippine Passport</option>
							<option>Philippine Driver’s License </option>
							<option>Professional RegulatoryCommission (PRC) Card </option>
							<option>Postal ID</option>
							<option>Armed Forces of thePhilippines ID</option>
							<option>Social Security System(SSS)</option>
							<option>Government ServiceInsurance System (GSIS) </option>
							<option>Unified Multi-Purpose ID </option>
							<option>Phil Health ID </option>
							<option>Tax Identification Number(TIN) Card </option>
							<option>Persons with disability(PWD) Card </option>
							<option>National ID </option>
						  </select>
						</div>
					  </div>
            
					  <div class="col-lg-12">
						<div class="form-group">
						<label class="font-weight-normal">Upload valid ID</label>
						<div class="custom-file">
						<input type="file" name="UPLOAD_ID" id="UPLOAD_ID" class="form-control custom-file-input">
						<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
						</div>
					  </div>

					  <div class="col-lg-12">
						<div class="form-group">
						<label class="font-weight-normal">Upload ID with Selfie</label>
						<div class="custom-file">
						<input type="file" name="UPLOAD_WITH_SELFIE" id="UPLOAD_WITH_SELFIE" class="form-control custom-file-input">
						<label class="custom-file-label" for="customFile">Choose file</label>
						</div>
					  </div>
					  </div>
				</div><!----row-->
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" class="btn btn-primary btn-sm" name="register"><i class="fa fa-save"></i> SUBMIT</button>
            	
          	</div>
			</form>
        </div>
    </div>
</div>


 <?php @include "includes/footer.php";?>
<script>
      function previeww() {
        frameBaptised.src = URL.createObjectURL(event.target.files[0]);
      }
      function clearImagee() {
          document.getElementById('formFileBaptised').value = null;
          frameBaptised.src = "";
      }
  </script>

</body>
</html>
