<!---FOR ADD---->
<div class="modal fade" id="add" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-plus"></span> CONTACT DETAILS</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
          	<div class="modal-body">
            	<form class="form-horizontal needs-validation" method="POST" action="department_add.php" enctype="multipart/form-data" novalidate>
          		  <div class="row">
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">PERSON 1 </label>
                            <input type="text" class="form-control" placeholder="" name="DEPT_NAME" required>
                            <div class="invalid-feedback">
                                Contact name is required*
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                       <div class="form-group">
                             <label for="lastname" class="control-label"> E-MAIL ADDRESS</label>
                            <input type="text" class="form-control" placeholder="" name="DEPT_EMAIL" required>
                            <div class="invalid-feedback">
                                Email address is required*
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                       <div class="form-group">
                             <label for="lastname" class="control-label"> LANDLINE</label>
                            <input type="text" class="form-control" placeholder="" name="DEPT_LANDLINE" required>
                            <div class="invalid-feedback">
                                Landline is required*
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">PERSON 2</label>
                            <input type="text" class="form-control" placeholder="" name="DEPT_DEANS" required>
                            <div class="invalid-feedback">
                                Person 2 is required*
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">EMAIL ADDRESS </label>
                            <input type="text" class="form-control" placeholder="" name="DEPT_DEANS_EMAIL" required>
                            <div class="invalid-feedback">
                                Email is required*
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">PROFILE</label>
                            <input type="file" class="form-control" placeholder="" name="DEPT_PROFILE">
                            <div class="invalid-feedback">
                                Profile is required*
                            </div>
                        </div>
                    </div>

                </div><!----row-->
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" class="btn btn-primary btn-sm" name="submit"><i class="fa fa-save"></i> SUBMIT</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!---FOR EDIT---->
<div class="modal fade" id="dept_edit_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-edit"></span> CONTACT DETAILS </h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
            <form class="form-horizontal needs-validation" method="POST" action="department_edit.php" enctype="multipart/form-data" novalidate>
          	<div class="modal-body">
          		  <div class="row">
                  <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">PERSON 1</label>
                             <input type="hidden" class="form-control" id="edit_deptid" name="DEPT_ID" required>
                            <input type="text" class="form-control" id="edit_deptname" name="DEPT_NAME" required>
                            <div class="invalid-feedback">
                                Contact name is required*
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                       <div class="form-group">
                             <label for="lastname" class="control-label">E-MAIL ADDRESS</label>
                            <input type="text" class="form-control" id="edit_deptemail" placeholder="" name="DEPT_EMAIL" required>
                            <div class="invalid-feedback">
                                Email address is required*
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                       <div class="form-group">
                             <label for="lastname" class="control-label">LANDLINE</label>
                            <input type="text" class="form-control" id="edit_deptlandline" placeholder="" name="DEPT_LANDLINE" required>
                            <div class="invalid-feedback">
                                Landline is required*
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">PERSON 2</label>
                            <input type="text" class="form-control" id="edit_deptdeans" placeholder="" name="DEPT_DEANS" required>
                            <div class="invalid-feedback">
                               Person is required*
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">E-EMAIL</label>
                            <input type="text" class="form-control" id="edit_deptdeansemail" placeholder="" name="DEPT_DEANS_EMAIL" required>
                            <div class="invalid-feedback">
                                Person is required*
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">PROFILE</label>
                            <input type="file" class="form-control" placeholder="" name="DEPT_PROFILE">
                            <div class="invalid-feedback">
                                Profile is required*
                            </div>
                        </div>
                    </div>

                </div><!----row-->
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" class="btn btn-primary btn-sm" name="submit"><i class="fa fa-save"></i> SUBMIT</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!---FOR DELETE---->
<div class="modal fade" id="dept_del_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-question-circle"></span> Are you sure you want to delete this contact?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="department_delete.php" method="POST">
                 <input type="hidden" id="del_deptid" name="DEPT_ID">
                 NAME : <span id="del_deptname"></span><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CANCEL</button>
                <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa fa-thrash"></i> <span class="fa fa-trash"></span>  SUBMIT</button>
            </div>
            </form>
        </div>
    </div>
</div>


