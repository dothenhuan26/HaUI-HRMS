<!-- Apply Job Modal -->
<div
    class="modal custom-modal fade"
    id="apply_job"
    role="dialog">
    <form
        enctype="multipart/form-data"
        action="{{route("job.detail.send-cv", ["id" => $row->id])}}"
        method="POST">
        @csrf
        <div
            class="modal-dialog modal-dialog-centered"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__("Add Your Details")}}</h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>{{__("Name")}} <span class="text-danger">*</span></label>
                            <input
                                name="name"
                                class="form-control"
                                required
                                type="text">
                        </div>
                        <div class="form-group">
                            <label>{{__("Email Address")}} <span class="text-danger">*</span></label>
                            <input
                                name="email"
                                class="form-control"
                                required
                                type="email">
                        </div>
                        <div class="form-group">
                            <label class="">{{__("Message")}} <span class="text-danger">*</span></label>
                            <textarea
                                class="form-control"
                                required
                                name="message"></textarea>
                        </div>
                        <div class="form-group">
                            <label>{{__("Upload your CV")}} <span class="text-danger">*</span></label>
                            <div class="custom-file">
                                <input
                                    type="file"
                                    required
                                    name="cv"
                                    class="custom-file-input"
                                    id="cv_upload">
                                <label
                                    class="custom-file-label"
                                    for="cv_upload">{{__("Choose file")}}</label>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">{{__("Submit")}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /Apply Job Modal -->
