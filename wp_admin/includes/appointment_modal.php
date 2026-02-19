<!---FOR ADD---->
<div class="modal fade" id="approved_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-thumbs-up"></span> PLEASE CONFIRM</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
            
            <form autocomplete="off" class="form-horizontal needs-validation" method="POST" action="appointment_approved.php" enctype="multipart/form-data" novalidate>
          	<div class="modal-body">
                    <input type="text" id="approved_appid" name="APP_ID" required hidden>
                    <p>Are you sure you want to approved this appointment?</p>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" class="btn btn-primary btn-sm" name="submit"><i class="fa fa-save"></i> SUBMIT</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<!---FOR ADD---->
<div class="modal fade" id="rejected_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-thumbs-down"></span> PLEASE CONFIRM</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
            <form autocomplete="off" class="form-horizontal needs-validation" method="POST" action="appointment_reject.php" enctype="multipart/form-data" novalidate>
          	<div class="modal-body">
                    <input type="text" id="appreject_appid" name="APP_ID" required hidden>
                    
                    <div class="col-md-12">
                    <p>Are you sure you want to reject this appointment?</p>
                        <div class="form-group">
                            <label for="">PLEASE ENTER REMARKS </label>
                            <textarea name="REMARKS" class="form-control" rows="8" required></textarea>
                        </div>
                    </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" class="btn btn-primary btn-sm" name="submit"><i class="fa fa-save"></i> SUBMIT</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<div class="modal fade" id="complete_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-check"></span> MARKED AS COMPLETED</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
            <form autocomplete="off" class="form-horizontal needs-validation" method="POST" action="appointment_complete.php" enctype="multipart/form-data" novalidate>
          	<div class="modal-body">
                    <input type="text" id="appcompleted_appid" name="APP_ID" required hidden>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">PLEASE ENTER REMARKS </label>
                            <textarea name="REMARKS" class="form-control" rows="8" required></textarea>
                        </div>
                    </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" class="btn btn-primary btn-sm" name="submit"><i class="fa fa-save"></i> SUBMIT</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<div class="modal fade" id="payment_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-check"></span> MARKED AS COMPLETED</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
            <form autocomplete="off" class="form-horizontal needs-validation" method="POST" action="payment_process.php" enctype="multipart/form-data" novalidate>
          	<div class="modal-body">
                    <input type="text" id="pay_appid" name="APP_ID" required hidden>
                    <input type="text" id="pay_cotid" name="PAY_COT_ID" required hidden>
					
					 <div class="col-md-12">
                        <div class="form-group">
                            <label for="">TO PAY </label>
                            <input type="number" id="pay_balance" class="form-control"  readonly required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">ENTER PAYMENT </label>
                            <input type="number" id="payment" name="PAY_PAYMENT" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">REMAINING PAYMENT </label>
                            <input type="number" id="remain_balance" name="PAY_BALANCE" class="form-control" required>
                        </div>
                    </div>
					
					<div class="col-md-12">
                        <div class="form-group">
                            <label for="">PLEASE ENTER REMARKS </label>
                            <textarea name="PAY_REMARKS" class="form-control" rows="8" required></textarea>
                        </div>
                    </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" id="disabled" class="btn btn-primary btn-sm" name="submit"><i class="fa fa-save"></i> SUBMIT</button>
            	</form>
          	</div>
        </div>
    </div>
</div>