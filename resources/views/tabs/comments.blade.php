<div id="comment" class="tabs active comment-area">
    <h3 class="comments-title">(<span id="total-comment">{{ $campaign->comments->count() }}</span>) Comment(s)</h3>
    <ol class="comments-list"id ="comments-list">
        @each('pages.comment', $campaign->comments, 'comment')
    </ol>
    <div id="respond" class="comment-respond">
        <h3 id="reply-title" class="comment-reply-title">Leave A Comment?</h3>
        @if(!auth()->user())
            <a href="{{ route('login') }}" class="btn-primary">Login To Drop a Comment</a>
        @else
            <form action="{{ route('post.comments') }}" id="commentForm">
                <div class="field-textarea">
                    <textarea rows="8" placeholder="Your Comment" name="comment" id="comment-box" required></textarea>
                    <input type="hidden" id="campaign-id" name="campaign_id" value="{{ $campaign->id }}" />
                </div>
                <button type="submit" value="Send Messager" class="btn-primary" id="submit-comment-btn">Post Comment</button>
            </form>
        @endif
    </div>
</div>