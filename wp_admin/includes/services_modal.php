<!---FOR ADD---->
<div class="modal fade" id="new_services" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-plus"></span>NEW SERVICE</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
      <form class="form-horizontal needs-validation" method="POST" action="services_add.php" enctype="multipart/form-data" novalidate>
          	<div class="modal-body text-uppercase">
          		  <div class="row">

                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">START DAY</label>
                      <select style="width:100%" class="form-control select2" name="SERVICE_FROM_DAY" required>
                          <option value=""></option>
                          <option>Monday</option>
                          <option>Tuesday</option>
                          <option>Wednesday</option>
                          <option>Thursday</option>
                          <option>Friday</option>
                          <option>Saturday</option>
                          <option>Sunday</option>
                          <option>Holiday</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">END DAY</label>
                      <select style="width:100%" class="form-control select2" name="SERVICE_END_DAY" required>
                          <option value=""></option>
                          <option>Monday</option>
                          <option>Tuesday</option>
                          <option>Wednesday</option>
                          <option>Thursday</option>
                          <option>Friday</option>
                          <option>Saturday</option>
                          <option>Sunday</option>
                          <option>Holiday</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">START</label>
                      <input type="time"  class="form-control" name="SERVICE_START" placeholder="" required>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">END</label>
                      <input type="time"  class="form-control" name="SERVICE_END" placeholder="" required>
                    </div>
                    </div>
                    <div class="col-lg-12">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">DESCRIPTION</label>
                      <textarea type="text" rows="8" class="form-control" name="SERVICE_DESC" placeholder="" required></textarea>
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
<div class="modal fade" id="ediTime_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-edit"></span>SERVICE</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
      <form class="form-horizontal needs-validation" method="POST" action="services_edit.php" enctype="multipart/form-data" novalidate>
          	<div class="modal-body text-uppercase">
          		  <div class="row">
                  <input type="hidden" name="SERVICE_ID" class="edit_serid">
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">START DAY</label>
                      <select style="width:100%" class="form-control " name="SERVICE_FROM_DAY" required>
                          <option class="edit_fromday"></option>
                          <option>Monday</option>
                          <option>Tuesday</option>
                          <option>Wednesday</option>
                          <option>Thursday</option>
                          <option>Friday</option>
                          <option>Saturday</option>
                          <option>Sunday</option>
                          <option>Holiday</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">END DAY</label>
                      <select style="width:100%" class="form-control " name="SERVICE_END_DAY" required>
                      <option class="edit_endday"></option>
                          <option>Monday</option>
                          <option>Tuesday</option>
                          <option>Wednesday</option>
                          <option>Thursday</option>
                          <option>Friday</option>
                          <option>Saturday</option>
                          <option>Sunday</option>
                          <option>Holiday</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">START</label>
                      <input type="time" class="form-control edit_starttime" name="SERVICE_START" placeholder="" required>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">END</label>
                      <input type="time" class="form-control edit_endtime" name="SERVICE_END" placeholder="" required>
                    </div>
                    </div>
                    <div class="col-lg-12">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">DESCRIPTION</label>
                      <textarea type="text" rows="8" class="form-control edit_desc" name="SERVICE_DESC" placeholder="" required></textarea>
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
<div class="modal fade" id="service_del_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-trash-alt"></span> PLEASE CONFIRM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="services_delete.php" method="POST">
              <div class="modal-body text-center">
                  <input type="hidden" class="del_serviceid" name="SERVICE_ID">
                  <span> Are you sure you want to delete this record?</span>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CANCEL</button>
                  <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa fa-thrash"></i> <span class="fa fa-trash"></span>  SUBMIT</button>
              </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="ServiceDesc" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-pen"></span> SERVICE DESCRIPTION</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
            <form class="form-horizontal submit-livelihood-validation" action="services_about.php" method="POST"  autocomplete="off" enctype="multipart/form-data" novalidate>
            <div class="modal-body">
          		  <div class="row">
                    <div class="col-sm-12">
                    <label for="lastname" class="control-label font-weight-normal">DESCRIPTION</label>
                    <?php
                    $sql = "SELECT * FROM tbl_services LIMIT 1";
                    $sql=$conn->prepare($sql);
                    if($sql->execute()){
                        $aresult=$sql->get_result();
                        if($aresult->num_rows >0){
                            $row_about = $aresult->fetch_assoc();
                            $atbout= $row_about["SERVICE_ABOUT"];
                            print '<textarea rows="10" class="form-control"  name="SERVICE_ABOUT" required>'.$atbout.'</textarea>';
                        }else{
                            print '<textarea rows="10" class="form-control"  name="SERVICE_ABOUT" required>Empty</textarea>';
                        }
                    }
                      ?> 

                     
                    </div>
                </div><!----row-->
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-warning text-white btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> SUBMIT</button>
            	</form>
          	</div>
        </div>
    </div>
</div>