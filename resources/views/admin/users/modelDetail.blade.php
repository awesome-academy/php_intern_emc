<!-- Modal -->
<div class="modal fade" id="viewDetail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin.user.view_detail') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table history-order">
                <thead>
                    <tr>
                        <th>{{ trans('admin.user.img') }}</th>
                        <th>{{ trans('admin.user.name_product') }}</th>
                        <th>{{ trans('admin.user.quantity') }}</th>
                        <th>{{ trans('admin.user.total') }}</th>
                    </tr>
                </thead>
                <tbody id="content_detail">
                </tbody>
            </table>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('admin.user.close') }}</button>
        </div>
        </div>
    </div>
</div>
