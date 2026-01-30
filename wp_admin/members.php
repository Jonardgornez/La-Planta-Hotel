<?php @include "includes/header.php";?>
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
            <h1>Users record</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
              <a href="#_add_modal" data-toggle="modal" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> REGISTER</a>
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
              <table id="example1" class="table table-bordered table-hover table-striped table-sm">
                <thead class="">
                  <tr class="text-uppercase">
                  <th rowspan="2">#</th>
                  <th rowspan="2">First Name</th>
                  <th colspan="6" class="text-center">Access permission</th>
                  <th rowspan="2">Username</th>
                  <th rowspan="2">Password </th>
                  <th rowspan="2">Status</th>
                  <th rowspan="2">Tools</th>
                </tr>
                <tr>
                  <th>Create</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>Approve</th>
                  <th>Reject</th>
                  <th>Complete</th>
                </tr>
                </thead>
                <tbody>
				        <?php
                    $sql = "SELECT * FROM tbl_users";
                    $query = $conn->query($sql);
                    $cnt=1;
                    while($row = $query->fetch_assoc()){
                      $add=$row['PERMISSION_ADD']; 
                      $edit=$row['PERMISSION_EDIT']; 
                      $delete=$row['PERMISSION_DELETE']; 
                      $all=$row['PERMISSION_ALL'];
                      $approved=$row['PERMISSION_APPROVED'];
                      $rejected=$row['PERMISSION_REJECT'];
                      $completed=$row['PERMISSION_COMPLETE'];

                      if($row['ROLE']=="ADMIN"){
                          $bg='text-primary';
                      }else{
                          $bg='';
                      }
                      
                      if($add=="YES"){$adds ="<span class='fa fa-check text-success'></span>";}else{$adds ="<span class='fa fa-times text-danger'></span>";}
                      if($edit=="YES"){$edits ="<span class='fa fa-check text-success'></span>"; }else{$edits ="<span class='fa fa-times text-danger'></span>";}
                      if($delete=="YES"){$deletes ="<span class='fa fa-check text-success'></span>";}else{ $deletes ="<span class='fa fa-times text-danger'></span>";}
                      if($approved=="YES"){$approveds ="<span class='fa fa-check text-success'></span>";}else{$approveds ="<span class='fa fa-times text-danger'></span>";}
                      if($rejected=="YES"){$rejecteds ="<span class='fa fa-check text-success'></span>";}else{$rejecteds ="<span class='fa fa-times text-danger'></span>";}
                      if($completed=="YES"){$completeds ="<span class='fa fa-check text-success'></span>";}else{$completeds ="<span class='fa fa-times text-danger'></span>";}
                      ?>
                        <tr class="<?=$bg;?>">
                          <td><?=$cnt; ?></td>
                          <td><?=$row['LASTNAME'].', '.$row['FIRSTNAME'].' '.$row['MI'].' [<i>'.$row['ROLE'].'</i>]'; ?></td>
                          <td><?=$adds;?></td>
                          <td><?=$edits;?></td>
                          <td><?=$deletes;?></td>
                          <td><?=$approveds;?></td>
                          <td><?=$rejecteds;?></td>
                          <td><?=$completeds;?></td>
                          <td><?=$row['USERNAME']; ?></td>
						              <td><?=$row['PASSWORD']; ?>
                           <a href="members_reset_password.php?resetpass=<?=$row['ID'];?>" style="float:right" class="btn btn-primary btn-sm">
                           <span class="fa fa-recycle" aria-hidden="true"></span></a>
                          </td>
                          <td>
                          <?php 
                            if ($row['ACC_STATUS'] ==0){
                              echo '<a class="text-danger" href="members_confirmed.php?confirmed='.$row['ID'].'">
                            <i class="fa fa-circle text-danger" aria-hidden="true"></i> Deactive</a>
                              ';
                            }elseif($row['ACC_STATUS']==1){
                                echo '<a href="members_disabled.php?confpending='.$row['ID'].'"><i class="fa fa-circle text-success"></i> Active</a>';
                            }
                            ?>
                            
                          </td>
                          <td>
                            <div class="btn-group">
						              	<button class="btn btn-primary btn-sm"
                            data-id="<?=$row['ID'];?>" 
                            data-firstname="<?=$row['FIRSTNAME'];?>"
                            data-mi="<?=$row['MI'];?>"
                            data-lastname="<?=$row['LASTNAME'];?>"
                            data-username="<?=$row['USERNAME'];?>"
                            data-password="<?=$row['PASSWORD'];?>"
                            data-role="<?=$row['ROLE'];?>"
                            data-add="<?=$row['PERMISSION_ADD'];?>"
                            data-edit="<?=$row['PERMISSION_EDIT'];?>"
                            data-delete="<?=$row['PERMISSION_DELETE'];?>"
                            data-approve="<?=$row['PERMISSION_APPROVED'];?>"
                            data-reject="<?=$row['PERMISSION_REJECT'];?>"
                            data-complete="<?=$row['PERMISSION_COMPLETE'];?>"
                            data-all="<?=$row['PERMISSION_ALL'];?>"
                            onclick="editMem(this);" data-jario="tooltip" data-placement="top" title="EDIT"><i class="fa-solid fa fa-edit"></i> </button>
                            <button class="btn btn-danger btn-sm" 
                            data-id="<?=$row['ID'];?>" 
                            onclick="deleteMem(this);" data-jario="tooltip" data-placement="top" title="DELETE"><i class="fa-solid fa fa-trash"></i> </button>
                          </div>
                          </td>
                        </tr>
                      <?php
                      $cnt++;
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
  <?php include "includes/members_modal.php";?>
 <?php include "includes/footer.php";?>

 <script type="text/javascript">
 function editMem(self) {
      var memid = self.getAttribute("data-id");
      var firstname = self.getAttribute("data-firstname");
      var mi = self.getAttribute("data-mi");
      var lastname = self.getAttribute("data-lastname");
      var username = self.getAttribute("data-username");
      var password = self.getAttribute("data-password");
      var role = self.getAttribute("data-role");
      var add = self.getAttribute("data-add");
      var edit = self.getAttribute("data-edit");
      var deletes = self.getAttribute("data-delete");
      var approves = self.getAttribute("data-approve");
      var rejects = self.getAttribute("data-reject");
      var complete = self.getAttribute("data-complete");
      var all = self.getAttribute("data-all");
      document.getElementById("edit_id").value = memid;
      document.getElementById("edit_firstname").value = firstname;
      document.getElementById("edit_mi").value = mi;
      document.getElementById("edit_lastname").value = lastname;
      document.getElementById("edit_username").value = username;
      document.getElementById("edit_password").value = password;
      document.getElementById("edit_role").innerHTML = role;
      //document.getElementsByClassName("edit_add")[0].value = add;
      //document.getElementsByClassName("edit_edit")[0].value = edit;
      //document.getElementsByClassName("edit_delete")[0].value = deletes;
      //document.getElementsByClassName("edit_all")[0].value = all;

      // if(add=='YES'){
      //     document.getElementsByClassName("edit_add")[0].checked=true;
      //   }else{
      //     document.getElementsByClassName("edit_add")[0].checked=false;
      //   }
      //   if(edit=='YES'){
      //       document.getElementsByClassName("edit_edit")[0].checked=true;
      //   }else{
      //     document.getElementsByClassName("edit_edit")[0].checked=false;
      //   }
      //   if(deletes=='YES'){
      //       document.getElementsByClassName("edit_delete")[0].checked=true;
      //     }else{
      //       document.getElementsByClassName("edit_delete")[0].checked=false;
      //   }

        
       if(add=='YES'){
          $('.pyes').each(function () {
              this.checked = true;
          });
        }else if(add=='NO'){
          $('.pno').each(function () {
              this.checked = true;
          });
        }
      if(edit=='YES'){
          $('.edyes').each(function () {
              this.checked = true;
          });
      }else if(edit=='NO'){
          $('.edno').each(function () {
              this.checked = true;
          });
      }
      if(deletes=='YES'){
          $('.delyes').each(function () {
              this.checked = true;
          });
        }else if(deletes=='NO'){
          $('.delno').each(function () {
              this.checked = true;
          });
       }

       if(approves=='YES'){
          $('.appyes').each(function () {
              this.checked = true;
          });
        }else if(approves=='NO'){
          $('.appno').each(function () {
              this.checked = true;
          });
       }
       if(rejects=='YES'){
          $('.rejyes').each(function () {
              this.checked = true;
          });
        }else if(rejects=='NO'){
          $('.rejno').each(function () {
              this.checked = true;
          });
       }
       if(complete=='YES'){
          $('.comyes').each(function () {
              this.checked = true;
          });
        }else if(complete=='NO'){
          $('.comno').each(function () {
              this.checked = true;
          });
       }

      $("#edit_modal").modal("show");
    }

    function deleteMem(self) {
      var delid = self.getAttribute("data-id");
      document.getElementById("del_id").value = delid;
      $("#del_modal").modal("show");
    }

    $(document).ready(function(){
    $("#edit_modal").on('hide.bs.modal', function(){
         $('.form-check-input').prop('checked', false);
      });
    });
</script> 
<script type="text/javascript">
    $(document).ready(function () {
        $('.selecctallyes').click(function (event) {
            if (this.checked) {
                $('.allyes').each(function () {
                    this.checked = true;
                });
                $('.allno').each(function () {
                    this.checked = false;
                });
            } else {
                $('.allyes').each(function () {
                    this.checked = false;
                });
                $('.allno').each(function () {
                    this.checked = true;
                });
            }
        });

        $('.selecctallno').click(function (event) {
            if (this.checked) {
                $('.allno').each(function () {
                    this.checked = true;
                });
                $('.allyes').each(function () {
                    this.checked = false;
                });
            } else {
                $('.allno').each(function () {
                    this.checked = false;
                });
                $('.allyes').each(function () {
                    this.checked = true;
                });
            }
        });

    });

</script>

</body>
</html>

