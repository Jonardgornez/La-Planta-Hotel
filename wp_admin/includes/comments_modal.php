<div class="modal fade" id="myModalDeleteComment" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"><span class="fa fa-question-circle"></span> CONFIRM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="comments_delete.php" method="POST" id="form-delete-comments">
                <input type="hidden" class="id" name="id">
                 <p>Are you sure you want to delete this comment?</p>
                 </form>
            </div>
            <div class="modal-footer">
            <div class="btn-group">
                <button type="button" class="btn bg-gradient-warning btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> NO</button>
                <button type="submit" form="form-delete-comments" name="form-delete-comments" class="btn bg-gradient-maroon btn-sm"><i class="fa fa-sharp fa-solid fa-trash-xmark"></i>  YES</button>
            </div>
</div>
        </div>
    </div>
</div>