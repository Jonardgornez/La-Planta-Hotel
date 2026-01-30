<!---FOR ADD---->
<div class="modal fade" id="add" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-plus"></span> ADD HOLIDAY</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
          	<div class="modal-body">
            	<form class="form-horizontal needs-validation" method="POST" action="holiday_add.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" novalidate>
          		  <div class="row">
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">DATE <i>Format mm-dd</i></label>
                            <input type="text" class="form-control" placeholder="mm-dd" name="blocked_date" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">DESCRIPTION</label>
                            <input type="text" class="form-control" placeholder="New Years Day"  name="blocked_name" required>
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
<div class="modal fade" id="edit_holiday" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-edit"></span> EDIT HOLIDAY </h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
          	<div class="modal-body">
            	<form class="form-horizontal needs-validation" method="POST" action="holiday_edit.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" novalidate>
          		  <div class="row">
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">DATE <i>Format mm-dd</i></label>
                             <input type="hidden" class="form-control" id="edit_holid" name="id" required>
                            <input type="text" class="form-control" id="edit_blocked_date" placeholder="mm-dd" name="blocked_date" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label for="lastname" class="control-label">DESCRIPTION</label>
                            <input type="text" class="form-control" id="edit_description" placeholder="New Years Day" name="blocked_name" required>
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
<div class="modal fade" id="del_holid_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-question-circle"></span> Are you sure you want to delete this record?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="holiday_delete.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="modal-body">
               
                 <input type="hidden" id="del_holid" name="del_holid">
                 Holiday Date : <?=date('Y-');?><span id="del_blocked_date"></span><br>
                 Description : <span id="del_description"></span><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
                <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-thrash"></i>  SUBMIT</button>
            </div>
            </form>
        </div>
    </div>
</div>


