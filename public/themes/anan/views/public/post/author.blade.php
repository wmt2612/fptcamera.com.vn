
@if($author)
    <div class=" post-author">
        <div class="post-author-content">
            <div class="author-avatar-box">
                <div class="author-avatar">
                    <img src="{{ $author->avatar->path ?? v(Theme::url('assets/images/icons/user.png')) }}"/>
                </div>
            </div>
            <div>
                <div class="author-name">
                    <span>{{ $author->full_name }}</span>
                </div>
                <div class="author-description">
                   {!! $author->description !!}
                </div>
            </div>
        </div>
    </div>
@endif