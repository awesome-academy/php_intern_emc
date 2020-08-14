<!-- Attachment Modal -->
<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="add-modal-label"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-modal-label"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="attachment-body-content">
                <form id="edit-form" class="form-horizontal" method="POST" action={{route('products.import')}} enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card text-white bg-gradient-info mb-0">
                        <div class="card-header bg-gradient-info">
                            <h2 class="m-0">{{trans('admin.import.title')}}</h2>
                        </div>
                        <div class="card-body">
                            <!-- name -->
                            <div class="form-group">
                                <label class="col-form-label" for="modal-input-name">{{trans('admin.import.name')}}</label>
                                <input type="file" name="excel_file" class="form-control" id="excel_file"
                                       required autofocus>
                            </div>
                            <input class="btn btn-success" type="submit">
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-body" id="attachment-body-content">
                <form id="edit-form" class="form-horizontal" method="POST"
                      action={{route('products.store')}} enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card text-white bg-gradient-info mb-0">
                        <div class="card-header bg-gradient-info">
                            <h2 class="m-0">{{trans('admin.product.add_title')}}</h2>
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
                                <input type="text" name="description" class="form-control" id="description  "
                                       required autofocus>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label"
                                       for="modal-input-name">{{trans('admin.product.information')}}</label>
                                <input type="text" name="information" class="form-control" id="information"
                                       required autofocus>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label"
                                       for="modal-input-name">{{trans('admin.product.amount')}}</label>
                                <input type="text" name="stock_amount" class="form-control" id="stock_amount"
                                       required autofocus>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label"
                                       for="modal-input-name">{{trans('admin.product.price')}}</label>
                                <input type="text" name="price" class="form-control" id="price"
                                       required autofocus>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label"
                                       for="modal-input-name">{{trans('admin.product.discount')}}</label>
                                <input type="text" name="discount" class="form-control" id="discount"
                                       required autofocus>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label"
                                       for="modal-input-name">{{trans('admin.product.category')}}</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label"
                                       for="modal-input-name">{{trans('admin.product.image')}}</label>
                                <input type="file" name="image" class="form-control" id="image"
                                       required autofocus>
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
