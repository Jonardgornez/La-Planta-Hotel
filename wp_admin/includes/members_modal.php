<!---FOR ADD---->
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="_add_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-plus"></span> REGISTER FORM</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
            <form class="form-horizontal needs-validation" action="members_add.php" method="POST"  autocomplete="off" enctype="multipart/form-data" novalidate>
            <div class="modal-body">
          		<div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                    <label for="firstname" class="control-label">FIRST NAME</label>
                    <input type="text" class="form-control" name="FIRSTNAME" placeholder="FIRSTNAME" required>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                    <label for="firstname" class="control-label">MIDDLE NAME</label>
                    <input type="text" class="form-control" name="MI" placeholder="MIDDLE NAME" required>
                </div>
                </div>


                <div class="col-md-5">
                    <div class="form-group">
                <label for="firstname" class="control-label">LAST NAME</label>
                <input type="text" class="form-control" name="LASTNAME" placeholder="LASTNAME" required>
                </div>
                </div>
                
                <div class="col-md-12">
                <div class="form-group">
                    <label for="firstname" class="control-label">ROLE</label>
                    <select class="form-control" name="ROLE" placeholder="" required>
                        <option value="" disabled selected>-SELECT-</option>
                        <option>ADMIN</option>
                        <option>USER</option>
                    </select>
                </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                <label for="firstname" class="control-label">USERNAME</label>
                <input type="text" class="form-control" name="USERNAME" placeholder="USERNAME" required>
                
                </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                <label for="firstname" class="control-label">PASSWORD</label>
                <input type="password" class="form-control" name="PASSWORD" placeholder="PASSWORD" required>
                </div>
                </div>
                <div class="col-md-12">
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th colspan="7" class="text-center bg-info"><label for="firstname" class="control-label">USER ACCESS CONTROL</label></th>
                        </tr>
                        <tr>
                            <th>CREATE</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                            <th>APPROVE</th>
                            <th>REJECT</th>
                            <th>COMPLETE</th>
                            <th>CHECK ALL</th>
                        </tr>
                        <tr>
                            <td>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allyes" name="PERMISSION_ADD" type="radio" value="YES" id="allYes">
                                    <label class="form-check-label" for="allYes">
                                    YES
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allno" name="PERMISSION_ADD" type="radio" value="NO" id="allNo">
                                    <label class="form-check-label" for="allNo">
                                    NO
                                    </label>
                                </div>
                            </div>
                            </td>
                            <td>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allyes" name="PERMISSION_EDIT" type="radio" value="YES" id="allYes">
                                    <label class="form-check-label" for="allYes">
                                    YES
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allno" name="PERMISSION_EDIT" type="radio" value="NO" id="allNo">
                                    <label class="form-check-label" for="allNo">
                                    NO
                                    </label>
                                </div>
                            </div>
                            </td>
                            <td>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allyes" name="PERMISSION_DELETE" type="radio" value="YES" id="allYes">
                                    <label class="form-check-label" for="allYes">
                                    YES
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allno" name="PERMISSION_DELETE" type="radio" value="NO" id="allNo">
                                    <label class="form-check-label" for="allNo">
                                    NO
                                    </label>
                                </div>
                            </div>
                            </td>

                            <td>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allyes" name="PERMISSION_APPROVED" type="radio" value="YES" id="allYes">
                                    <label class="form-check-label" for="allYes">
                                    YES
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allno" name="PERMISSION_APPROVED" type="radio" value="NO" id="allNo">
                                    <label class="form-check-label" for="allNo">
                                    NO
                                    </label>
                                </div>
                            </div>
                            </td>

                            <td>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allyes" name="PERMISSION_REJECT" type="radio" value="YES" id="allYes">
                                    <label class="form-check-label" for="allYes">
                                    YES
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allno" name="PERMISSION_REJECT" type="radio" value="NO" id="allNo">
                                    <label class="form-check-label" for="allNo">
                                    NO
                                    </label>
                                </div>
                            </div>
                            </td>

                            <td>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allyes" name="PERMISSION_COMPLETE" type="radio" value="YES" id="allYes">
                                    <label class="form-check-label" for="allYes">
                                    YES
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allno" name="PERMISSION_COMPLETE" type="radio" value="NO" id="allNo">
                                    <label class="form-check-label" for="allNo">
                                    NO
                                    </label>
                                </div>
                            </div>
                            </td>

                            <td>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allyes selecctallyes" name="PERMISSION_ALL" type="radio" value="YES">
                                    <label class="form-check-label" for="selecctallyes">
                                    ALL
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allno selecctallno" name="PERMISSION_ALL" type="radio" value="NO">
                                    <label class="form-check-label" for="selecctallno">
                                    ALL
                                    </label>
                                </div>
                            </div>
                            </td>
                        </tr>
                    </thead>
                </table>
                </div>
                </div><!----row-->
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-warning text-white btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> SUBMIT</button>
          	</div>
            </form>
        </div>
    </div>
</div>


<!---FOR ADD---->
<div class="modal fade mymodal" id="edit_modal" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-edit"></span> EDIT</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
            <form class="form-horizontal needs-validation" action="members_edit.php" method="POST"  autocomplete="off" enctype="multipart/form-data" novalidate>
            <div class="modal-body">
                <input type="hidden" id="edit_id" name="ID" required>
          		  <div class="row">
                    <div class="col-md-5">
                    <div class="form-group">
                    <label for="firstname" class="control-label">FIRST NAME</label>
                    <input type="text" class="form-control" id="edit_firstname" name="FIRSTNAME" placeholder="FIRSTNAME" required>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                    <label for="firstname" class="control-label">MIDDLE NAME</label>
                    <input type="text" class="form-control" id="edit_mi" name="MI" placeholder="MIDDLE NAME" required>
                </div>
                </div>


                <div class="col-md-5">
                    <div class="form-group">
                <label for="firstname" class="control-label">LAST NAME</label>
                <input type="text" class="form-control" id="edit_lastname" name="LASTNAME" placeholder="LASTNAME" required>
                </div>
                </div>
                
                <div class="col-md-12">
                <div class="form-group">
                    <label for="firstname" class="control-label">ROLE</label>
                    <select class="form-control" name="ROLE" placeholder="" required>
                        <option id="edit_role"></option>
                        <option>ADMIN</option>
                        <option>USER</option>
                    </select>
                </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                <label for="firstname" class="control-label">USERNAME</label>
                <input type="text" class="form-control" id="edit_username" name="USERNAME" placeholder="USERNAME" required>
                
                </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                <label for="firstname" class="control-label">PASSWORD</label>
                <input type="password" class="form-control" id="edit_password" name="PASSWORD" placeholder="PASSWORD" required>
                </div>
                </div>
                <div class="col-md-12">
                <table class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th colspan="7" class="text-center bg-info"><label for="firstname" class="control-label">USER ACCESS CONTROL</label></th>
                        </tr>
                        <tr>
                            <th>CREATE</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                            <th>APPROVE</th>
                            <th>REJECT</th>
                            <th>COMPLETE</th>
                            <th>CHECK ALL</th>
                        </tr>
                        <tr>
                            <td>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allyes pyes" name="PERMISSION_ADD" type="radio" value="YES" id="allYes">
                                    <label class="form-check-label" for="allYes">
                                    YES
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allno pno" name="PERMISSION_ADD" type="radio" value="NO" id="allNo">
                                    <label class="form-check-label" for="allNo">
                                    NO
                                    </label>
                                </div>
                            </div>
                            </td>
                            <td>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allyes edyes" name="PERMISSION_EDIT" type="radio" value="YES" id="allYes">
                                    <label class="form-check-label" for="allYes">
                                    YES
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allno edno" name="PERMISSION_EDIT" type="radio" value="NO" id="allNo">
                                    <label class="form-check-label" for="allNo">
                                    NO
                                    </label>
                                </div>
                            </div>
                            </td>
                            <td>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allyes delyes" name="PERMISSION_DELETE" type="radio" value="YES" id="allYes">
                                    <label class="form-check-label" for="allYes">
                                    YES
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allno delno" name="PERMISSION_DELETE" type="radio" value="NO" id="allNo">
                                    <label class="form-check-label" for="allNo">
                                    NO
                                    </label>
                                </div>
                            </div>
                            </td>
                            <!------>
                            <td>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allyes appyes" name="PERMISSION_APPROVED" type="radio" value="YES" id="allYes">
                                    <label class="form-check-label" for="allYes">
                                    YES
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allno appno" name="PERMISSION_APPROVED" type="radio" value="NO" id="allNo">
                                    <label class="form-check-label" for="allNo">
                                    NO
                                    </label>
                                </div>
                            </div>
                            </td>
                            <td>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allyes rejyes" name="PERMISSION_REJECT" type="radio" value="YES" id="allYes">
                                    <label class="form-check-label" for="allYes">
                                    YES
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allno rejno" name="PERMISSION_REJECT" type="radio" value="NO" id="allNo">
                                    <label class="form-check-label" for="allNo">
                                    NO
                                    </label>
                                </div>
                            </div>
                            </td>
                            <td>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allyes comyes" name="PERMISSION_COMPLETE" type="radio" value="YES" id="allYes">
                                    <label class="form-check-label" for="allYes">
                                    YES
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allno comno" name="PERMISSION_COMPLETE" type="radio" value="NO" id="allNo">
                                    <label class="form-check-label" for="allNo">
                                    NO
                                    </label>
                                </div>
                            </div>
                            </td>
                            <!------>
                            <td>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allyes edit_all selecctallyes" name="PERMISSION_ALL" type="radio" value="YES">
                                    <label class="form-check-label" for="selecctallyes">
                                    ALL
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input allno edit_all selecctallno" name="PERMISSION_ALL" type="radio" value="NO">
                                    <label class="form-check-label" for="selecctallno">
                                    ALL
                                    </label>
                                </div>
                            </div>
                            </td>
                        </tr>
                    </thead>
                </table>
                </div>

                </div><!----row-->
          	</div>
          	<div class="modal-footer">
            	<button type="reset" class="btn btn-warning text-white btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> SUBMIT</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<div class="modal fade" id="del_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-trash-alt"></span> PLEASE CONFIRM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="members_delete.php" method="POST">
            <div class="modal-body text-center">
                 <input type="hidden" id="del_id" name="ID">
                Are you sure you want to delete this user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CANCEL</button>
                <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa fa-thrash"></i> <span class="fa fa-trash"></span>  SUBMIT</button>
            </div>
            </form>
        </div>
    </div>
</div>