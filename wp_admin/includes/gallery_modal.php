<!---FOR ADD---->
<div class="modal fade" id="_add_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-plus"></span> GALLERY</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
            <form class="form-horizontal needs-validation" action="gallery_add.php" method="POST"  autocomplete="off" enctype="multipart/form-data" novalidate>
            <div class="modal-body">
          		  <div class="row main-form">
                    <div class="col-sm-12">
                    <label for="lastname" class="control-label font-weight-normal">DESCRIPTION</label>
                       <div class="input-group">
                            <input type="text" class="form-control" name="GALLERY_DESC[]" required>
                              <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary add-more-form"><i class="fa fa-plus"></i></button>
                            </div>       
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="lastname" class="control-label font-weight-normal">IMAGE</label>
                        <div class="input-group">
                            <div class="custom-file">
                            <input type="file" name="GALLERY_IMAGE[]" class="form-control custom-file-input" required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <div class="input-group-prepend">
                              <button type="button" class="btn btn-danger remove-btn"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>

                    </div><!----row-->
                    <div class="paste-new-forms"></div>

                
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-warning text-white btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
            	<button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> SUBMIT</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<!---FOR ADD---->
<div class="modal fade" id="edit_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-pen"></span> GALLERY</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
            <form class="form-horizontal submit-livelihood-validation" action="gallery_edit.php" method="POST"  autocomplete="off" enctype="multipart/form-data" novalidate>
            <div class="modal-body">
                <input type="hidden" class="edit_reqid" name="GALLERY_ID" required>
          		  <div class="row">
                    <div class="col-sm-12">
                    <label for="lastname" class="control-label font-weight-normal">DESCRIPTION</label>
                      <input type="text" class="form-control edit_reqname" id="" name="GALLERY_DESC" required>    
                    </div>
                    <div class="col-sm-12">
                        <label for="lastname" class="control-label font-weight-normal">IMAGE</label>
                        <div class="input-group">
                            <div class="custom-file">
                            <input type="file" name="GALLERY_IMAGE" class="form-control custom-file-input" required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
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


<div class="modal fade" id="del_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-trash-alt"></span> PLEASE CONFIRM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="gallery_delete.php" method="POST">
            <div class="modal-body text-center">
                 <input type="hidden" id="del_reqid" name="GALLERY_ID">
                Are you sure you want to delete this photos?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CANCEL</button>
                <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa fa-thrash"></i> <span class="fa fa-trash"></span>  SUBMIT</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="GalleryDesc" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-pen"></span> GALLERY DESCRIPTION</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
            <form class="form-horizontal submit-livelihood-validation" action="gallery_edit_desc.php" method="POST"  autocomplete="off" enctype="multipart/form-data" novalidate>
            <div class="modal-body">
          		  <div class="row">
                    <div class="col-sm-12">
                    <label for="lastname" class="control-label font-weight-normal">DESCRIPTION</label>
                    <?php
                    $sql = "SELECT * FROM tbl_gallery LIMIT 1";
                    $sql=$conn->prepare($sql);
                    if($sql->execute()){
                        $aresult=$sql->get_result();
                        if($aresult->num_rows >0){
                            $row_about = $aresult->fetch_assoc();
                            $atbout= $row_about["GALLERY_ABOUT"];
                            print '<textarea rows="10" class="form-control"  name="GALLERY_ABOUT" required>'.$atbout.'</textarea>';
                        }else{
                            print '<textarea rows="10" class="form-control"  name="GALLERY_ABOUT" required>Empty</textarea>';
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