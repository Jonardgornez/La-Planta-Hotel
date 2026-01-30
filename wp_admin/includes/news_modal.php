<!---FOR ADD---->
<div class="modal fade" id="add_news" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-plus"></span> ADVISORY</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
      <form class="form-horizontal needs-validation" method="POST" action="advisories_add.php" enctype="multipart/form-data" novalidate>
          	<div class="modal-body text-uppercase">
          		  <div class="row">

                    <div class="col-lg-12">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">TITLE</label>
                      <input type="text"  class="form-control" name="NEWSNAME" placeholder="TITLE" required>
                    </div>
                    </div>
                    <div class="col-lg-12">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">DESCRIPTION</label>
                      <textarea rows="10" class="form-control" name="NEWSDESCRIPTION" placeholder="DESCRIPTION" required></textarea>
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

<!-----FOR EDIT-----> 

<!---FOR ADD---->
<div class="modal fade" id="news_edit_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
			  <h4 class="modal-title"><span class="fa fa-edit"></span> ADVISORY</h4>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
      <form class="form-horizontal needs-validation" method="POST" action="advisories_edit.php" enctype="multipart/form-data" novalidate>
          	<div class="modal-body text-uppercase">
          		  <div class="row">

                    <div class="col-lg-12">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">TITLE</label>
                      <input type="hidden"  class="edit_newsid" name="NEWSID" required>
                      <input type="text"  class="form-control edit_newsname" name="NEWSNAME" placeholder="TITLE" required>
                    </div>
                    </div>
                    <div class="col-lg-12">
                    <div class="form-group">
                      <label for="" class="control-label font-weight-normal">DESCRIPTION</label>
                      <textarea rows="10" class="form-control edit_newsdescription" name="NEWSDESCRIPTION" placeholder="DESCRIPTION" required></textarea>
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
<div class="modal fade" id="news_del_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-trash-alt"></span> PLEASE CONFIRM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form action="advisories_delete.php" method="POST">
                 <input type="hidden" class="del_newsid" name="NEWSID">
                 <strong> Are you sure you want to delete this record?</strong><br>
                  <span class="del_newsname"></span><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CANCEL</button>
                <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa fa-thrash"></i> <span class="fa fa-trash"></span>  SUBMIT</button>
            </div>
            </form>
        </div>
    </div>
</div>


