<!-- Attachment Modal -->
<div class="modal fade" id="show_review" tabindex="-1" role="dialog" aria-labelledby="add-modal-label"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-modal-label">{{trans('admin.comments.review')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="attachment-body-content">
                <div class="rate">
                    <input type="radio" id="star5" name="rating_comment" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rating_comment" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rating_comment" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rating_comment" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rating_comment" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>

                <div class="form-group"><label></label>
                    <textarea name="content" id="content_comment" class="form-control"></textarea></div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm js-btn-add-review" value="{{$product->id}}"> {{trans('admin.comments.submit_btn')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Attachment Modal -->
