<!---FOR ADD---->
<div class="modal fade" id="add_member" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-plus"></span> MANAGE ROOMS</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
      <form class="form-horizontal needs-validation" method="POST" action="cottage_add.php" enctype="multipart/form-data" novalidate>
          	<div class="modal-body text-uppercase">
          		  <div class="row">

                    <div class="col-lg-12">
                    <div class="form-group">
                    <input type="TEXT" class="form-control" name="COT_NUMBER" value="<?=$number;?>" required>
                      <label for="" class="control-label font-weight-normal">ROOM Name</label>
                      <input type="text"  class="form-control" name="COT_NAME" placeholder="" required>
                    </div>
                    </div>
                    <div class="col-lg-12">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">Description</label>
                      <input type="text"  class="form-control" name="COT_DESCRIPTION" placeholder="" required>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">Price</label>
                      <input type="number"  class="form-control" name="COT_PRICE" placeholder="" required>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">Number of Guest</label>
                        <select style="width:100%" class="form-control" name="COT_NUM_GUEST" required>
                          <option value=""></option>
                          <?php
                            $i=1;
                            for($i;$i<=500;$i++){
                              print '<option>'.$i.'</option>';
                            }
                          ?>
                        </select>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">Inclusion(separated by comma)</label>
                      <textarea rows="8" name="COT_INCLUSION" class="form-control" required></textarea>
                      
                    </div>
                    </div>
                  
                    <div class="col-lg-12">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">Status</label>
                      <select style="width:100%" class="form-control select2" name="COT_STATUS" required>
                          <option>ACTIVE</option>
                          <option>DEACTIVATE</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <label class="font-weight-normal">IMAGE</label>
                    <div class="custom-file">
                    <input type="file" name="COT_IMAGE" class="form-control custom-file-input" required>
                    <label class="custom-file-label" for="customFile">Choose file</label>
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
<div class="modal fade" id="editCot_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-plus"></span> EDIT COTTAGE</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
      <form class="form-horizontal needs-validation" method="POST" action="cottage_edit.php" enctype="multipart/form-data" novalidate>
          	<div class="modal-body text-uppercase">
          		  <div class="row">

                    <div class="col-lg-12">
                    <div class="form-group">
                    <input type="hidden" class="form-control edit_cotid" name="COT_ID" required>
                      <label for="" class="control-label font-weight-normal">Room Name</label>
                      <input type="text"  class="form-control edit_cotname" name="COT_NAME" placeholder="" required>
                    </div>
                    </div>
                    <div class="col-lg-12">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">Description</label>
                      <input type="text"  class="form-control edit_cotdesc" name="COT_DESCRIPTION" placeholder="" required>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">Price</label>
                      <input type="number"  class="form-control edit_cotprice" name="COT_PRICE" placeholder="" required>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">Number of Guest</label>
                        <select style="width:100%" class="form-control" name="COT_NUM_GUEST" required>
                          <option class="edit_cotguest"></option>
                          <?php
                            $i=1;
                            for($i;$i<=500;$i++){
                              print '<option>'.$i.'</option>';
                            }
                          ?>
                        </select>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">Inclusion(separated by comma)</label>
                      <textarea rows="8" name="COT_INCLUSION" class="form-control edit_cotinclus" required></textarea>
                      
                    </div>
                    </div>
                  
                    <div class="col-lg-12">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">Status</label>
                      <select style="width:100%" class="form-control" name="COT_STATUS" required>
                          <option class="edit_cotstats"></option>
                          <option>ACTIVE</option>
                          <option>DEACTIVATE</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                    <label class="font-weight-normal">IMAGE</label>
                    <div class="custom-file">
                    <input type="file" name="COT_IMAGE" class="form-control custom-file-input">
                    <label class="custom-file-label" for="customFile">Choose file</label>
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
<div class="modal fade" id="member_del_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-trash-alt"></span> PLEASE CONFIRM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form action="cottage_delete.php" method="POST">
                 <input type="hidden" id="del_cotid" name="COT_ID">
                 <strong> Are you sure you want to delete this record?</strong><br>
                  <span id="del_cotname"></span><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CANCEL</button>
                <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa fa-thrash"></i> <span class="fa fa-trash"></span>  SUBMIT</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="member_actions_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-alert-exclamation" id="actions_cotnumber"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="needs-validation" action="cottage_actions.php" method="POST" novalidate>
            <div class="modal-body">
                 <input type="hidden" id="actions_cotid" name="COT_ID">
                  <div class="row"> 
                      <div class="col-md-12">
                        <div class="form-group">
                        <label for="" class="control-label font-weight-normal">Please select Status</label>
                        <select style="width:100%" class="form-control" name="COT_STATUS" required>
                          <option id="actions_cotstats"></option>
                          <option>ACTIVE</option>
                          <option>DEACTIVATE</option>
                        </select>
                        </div>        
                      </div>

                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CANCEL</button>
                <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>  SUBMIT</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="CottageDesc" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-pen"></span> ROOM DESCRIPTION</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
            <form class="form-horizontal submit-livelihood-validation" action="cottage_about.php" method="POST"  autocomplete="off" enctype="multipart/form-data" novalidate>
            <div class="modal-body">
          		  <div class="row">
                    <div class="col-sm-12">
                    <label for="lastname" class="control-label font-weight-normal">DESCRIPTION</label>
                    <?php
                    $sql = "SELECT * FROM tbl_cottage LIMIT 1";
                    $sql=$conn->prepare($sql);
                    if($sql->execute()){
                        $aresult=$sql->get_result();
                        if($aresult->num_rows >0){
                            $row_about = $aresult->fetch_assoc();
                            $atbout= $row_about["COT_ABOUT"];
                            print '<textarea rows="10" class="form-control"  name="COT_ABOUT" required>'.$atbout.'</textarea>';
                        }else{
                            print '<textarea rows="10" class="form-control"  name="COT_ABOUT" required>Empty</textarea>';
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