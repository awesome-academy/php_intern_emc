@foreach($comments as $comment)
    <div class="reviews-members pt-4">
        <div class="media">
            <a href="#"><img alt="avatar"
                             src="{{($comment->user->avatar) ? ($comment->user->avatar) : 'http://bootdey.com/img/Content/avatar/avatar1.png'}}"
                             class="mr-3 rounded-pill"></a>
            <div class="media-body">
                <div class="reviews-members-header">
                    <h5 class="mb-1"><a class="text-black"
                                        href="#">{{$comment->user->full_name}}</a></h5>
                    <p class="text-gray">{{$comment->created_at}}</p>
                </div>
                <div class="reviews-members-body">
                    <p>{{$comment->content}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="border-top-grey"></div>
@endforeach
<div class="pagination_comment">
    {!! $comments->render() !!}
</div>
