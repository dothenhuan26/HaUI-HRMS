<!-- Delete Department Modal -->
<div
    class="modal custom-modal fade"
    id="delete_user"
    role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>{{__("Delete User")}}</h3>
                    <p>{{__("Are you sure want to delete?")}}</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a
                                href=""
                                id=""
                                class="btn btn-primary continue-btn {{$randDeleteContinue}}">{{__("Delete")}}</a>
                        </div>
                        <div class="col-6">
                            <a
                                href="javascript:void(0);"
                                data-dismiss="modal"
                                class="btn btn-primary cancel-btn">{{__("Cancel")}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Department Modal -->


