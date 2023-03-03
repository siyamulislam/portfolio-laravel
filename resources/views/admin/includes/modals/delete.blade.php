<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Are you confirm to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-round waves-effect" data-dismiss="modal">Cancel
                </button>
                <form id="deleteForm" action=""
                      method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary btn-round waves-effect" id="btnMdDelete">Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
