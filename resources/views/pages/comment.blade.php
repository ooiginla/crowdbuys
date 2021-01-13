<li class="comment clearfix"> 
    <div class="comment-body">
        <div class="comment-avatar"><img src="{{ asset('images/comment.jpg') }}" alt=""></div>
        <div class="comment-info">
            <header class="comment-meta"></header>
            <cite class="comment-author">{{ $comment->user->fullname() }}</cite>
            <div class="comment-inline">
                <span class="comment-date">{{ Helper::ago($comment->created_at) }}</span>
            </div>
            <div class="comment-content"><p>{{ $comment->comment }}</p></div>
        </div>
    </div>
</li>