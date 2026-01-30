
<!---FOR DELETE---->
<div class="modal fade" id="del_modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-question-circle"></span> Are you sure you want to delete this record?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="contact_us_delete.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="modal-body">
               
                 <input type="hidden" id="del_cid" name="C_ID">
                 Name : <span id="del_name"></span><br>
                 Message : <span id="del_message"></span><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> CLOSE</button>
                <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-thrash"></i>  SUBMIT</button>
            </div>
            </form>
        </div>
    </div>
</div>


