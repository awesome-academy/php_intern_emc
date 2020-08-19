<!-- Attachment Modal -->
<div class="modal fade" id="create_request_product" tabindex="-1" role="dialog" aria-labelledby="add-modal-label"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-modal-label"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="attachment-body-content">
                <form id="edit-form" class="form-horizontal" method="POST"
                      action={{route('requestproducts.store')}} enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card text-black bg-gradient-info mb-0">
                        <div class="card-header bg-gradient-info">
                            <h2 class="m-0">{{trans('admin.requests.add_request_title')}}</h2>
                        </div>
                        <div class="card-body">
                            <!-- name -->
                            <div class="form-group">
                                <label class="col-form-label"
                                       for="modal-input-name">{{trans('admin.product.name')}}</label>
                                <input type="text" name="name" class="form-control" id="name"
                                       required autofocus>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label"
                                       for="modal-input-name">{{trans('admin.product.description')}}</label>
                                <input type="text" name="description" class="form-control" id="description"
                                       required autofocus>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image" id="image">
                            </div>
                            <input class="btn btn-success" type="submit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{trans('admin.product.btn_close')}}</button>
            </div>
        </div>
    </div>
</div>
<!-- /Attachment Modal -->
