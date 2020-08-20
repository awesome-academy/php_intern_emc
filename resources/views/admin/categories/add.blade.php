<!-- Attachment Modal -->
<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="add-modal-label"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-modal-label"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="category-content">
                <form id="edit-form" class="form-horizontal" method="POST" action={{route('categories.store')}}>
                    @csrf
                    <div class="card text-white bg-gradient-info mb-0">
                        <div class="card-header bg-gradient-info">
                            <h2 class="m-0">{{trans('admin.category.add_title')}}</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-form-label"
                                       for="modal-input-name">{{trans('admin.category.name')}}</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    autofocus>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label"
                                       for="modal-input-name">{{trans('admin.category.category_parent')}}</label>
                                <select class="form-control" name="parent_id">
                                    <option></option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
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
