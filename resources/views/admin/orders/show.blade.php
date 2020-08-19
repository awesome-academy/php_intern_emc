<!-- Attachment Modal -->
<div class="modal fade" id="show_order" tabindex="-1" role="dialog" aria-labelledby="add-modal-label"
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
                      action={{route('products.import')}} enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card text-black  mb-0">
                        <div class="card-header">
                            <h2 class="m-0">List Product Ordered</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>{{trans('admin.product.name')}}</th>
                                    <th>{{trans('admin.product.price')}}</th>
                                    <th>{{trans('admin.product.image')}}</th>
                                    <th>{{trans('admin.product.amount')}}</th>
                                </tr>
                                </thead>
                                <tbody class="content_order">
                                </tbody>
                            </table>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-body" id="attachment-body-content">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{trans('admin.product.btn_close')}}</button>
            </div>
        </div>
    </div>
</div>
<!-- /Attachment Modal -->
