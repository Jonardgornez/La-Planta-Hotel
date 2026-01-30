<!---FOR ADD---->
<div class="modal fade" id="add_slot" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-plus"></span> ADD SCHEDULE</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="schedule_add.php" enctype="multipart/form-data">
          		  <div class="row">
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label class="control-label">SLOTS</label>
                            <input type="number" class="form-control text-uppercase" name="slots" placeholder ="ENTER NUMBER OF SLOTS" required>
                        </div>
                    </div>

                    <div class="col-sm-12">
                    <div class="form-group">
                        <label  class="control-label">DATE</label>
                            <input type="date" class="form-control date_picker" name="slots_date" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label  class="control-label">START TIME</label>
                            <select name="start_time" class="form-control" required>
                            <option value=""></option>  
                                <option value="08:00">08:00 AM</option>
                                <option value="09:00">09:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="13:00">13:00 PM</option>
                                <option value="14:00">14:00 PM</option>
                                <option value="15:00">15:00 PM</option>
                                <option value="16:00">16:00 PM</option>
                                <option value="17:00">17:00 PM</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                    <div class="form-group">
                        <label class="control-label">END TIME</label>
                            <select name="end_time" class="form-control" required>
                                <option value=""></option>
                            <option value="08:00">08:00 AM</option>
                                <option value="09:00">09:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="13:00">13:00 PM</option>
                                <option value="14:00">14:00 PM</option>
                                <option value="15:00">15:00 PM</option>
                                <option value="16:00">16:00 PM</option>
                                <option value="17:00">17:00 PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label class="control-label">DURATON IN MINUTES</label>
                            <input type="number" class="form-control" name="duration" required>
                        </div>
                    </div>
                   
                </div><!----row-->
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-sm" name="submit"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!---FOR EDIT---->
<div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-edit"></span> UPDATE SCHEDULE </h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="schedule_edit.php" enctype="multipart/form-data">
          		  <div class="row">
                    <div class="col-sm-12">
                       <div class="form-group">
                             <label class="control-label">NUMBER OF SLOTS</label>
                             <input type="hidden" class="form-control id" name="id" required>
                             <input type="number" class="form-control" name="slots" id="edit_slots" placeholder ="ENTER NUMBER OF SLOTS" required>
                        </div>
                    </div>

                    <div class="col-sm-12">
                    <div class="form-group">
                        <label class="control-label">DATE</label>
                            <input type="date" class="form-control date_picker" id="edit_slots_date" name="slots_date" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label class="control-label">START TIME</label>
                            <input type="time" class="form-control" id="edit_start_time" name="start_time" required>
                        </div>
                    </div>

                    <div class="col-sm-12">
                    <div class="form-group">
                        <label class="control-label">END TIME</label>
                            <input type="time" class="form-control" id="edit_end_time" name="end_time" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label class="control-label">DURATON IN MINUTES</label>
                            <input type="number" class="form-control" id="edit_duration" name="duration" required>
                        </div>
                    </div>


                </div><!----row-->
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-sm" name="submit"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!---FOR DELETE---->
<div class="modal fade" id="sched_delete" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-question-circle"></span> Please Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="schedule_delete.php" method="POST">
            <div class="modal-body">
                 <input type="hidden" id="del_slotid" name="slotid">
                <p>Are you sure you want to delete this schedule on your database?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CANCEL</button>
                <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-thrash"></i> PROCEED</button>
            </div>
            </form>
        </div>
    </div>
</div>


