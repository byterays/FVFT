<div class="modal fade" id="dataDeleteModal" tabindex="-1" role="dialog" aria-labelledby="dataDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataDeleteModalLabel"><span id="modalTitle"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure, you want to perform delete operation?</p>
                <form action="#" method="#" class="d-none" id="deleteDataForm">
                    @csrf
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-secondary" id="dataDelBtn">Delete</button>
            </div>
        </div>
    </div>
</div>
