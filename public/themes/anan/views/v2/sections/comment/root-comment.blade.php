<div id="root-comment" data-title="Samsung Galaxy Z Flip4 5G 128GB" data-modulid="1" data-total="139">
    <div class="fpt-comment">
        <div class="">
            <div class="card card-md user-feedback">
                <div class="card-title"><h3 class="h5 heading">Hỏi &amp; Đáp</h3>
                    <div class="form-group">
                        <div class="form-search form-search-md"><span class="form-search-icon m-r-4"><i
                                    class="cm-ic-search cm-ic-sm"></i></span><input class="form-search-input m-r-8"
                                                                                    type="text"
                                                                                    id="searchCommentInput"
                                                                                    placeholder="Tìm theo nội dung, người gửi..."
                                                                                    value=""><span
                                class="form-search-icon form-search-clear"><i class="cm-ic-close cm-ic-md"></i></span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="user-form">
                        @if(auth()->check())
                            <div style="margin-bottom: 10px; gap: 10px; align-items: center" class="d-flex">
                                <p style="font-size: 16px">Xin chào, <b>{{ auth()->user()->full_name }}</b></p>
{{--                                <a class="btnChangeAccount" href="" style="color: blue">[Thay đổi]</a>--}}
                            </div>
                        @endif
                        <form id="sendCommentForm" action="#">
                            <div class="form-group"><textarea name="comment_content" class="form-input form-input-lg  "
                                                              rows="3"
                                                              placeholder="Nhập nội dung bình luận (tiếng Việt có dấu)..."></textarea>
                                <button type="submit" class="btn btn-primary btn-lg">GỬI BÌNH LUẬN</button>
                            </div>
                        </form>
                    </div>
                    <div class="user-content">
                        <div class="result">
                            <div class="text" id="totalComment"></div>
                            <div class="auto">
                                <div class="text">Sắp xếp theo</div>
                                    <!-- Example single danger button -->
                                   <div class="form-group">
                                       <select id="selectCommentSortBy" name="comment_sort_by">
                                           <option value="desc">Mới nhất</option>
                                           <option value="asc">Cũ nhất</option>
                                       </select>
                                   </div>
                            </div>
                        </div>
                        <div class="user-wrapper">
                        </div>
                        <div class="pages">
                            <div class="select-device__pagination">
                                <ul id="commentPagination" class="pagination pagination-space">

                                </ul>
                                <ul id="commentPaginationMobile" class="pagination pagination-space">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('v2.sections.comment.comment-modal')
    @include('v2.sections.comment.reply-comment-modal')
</div>

