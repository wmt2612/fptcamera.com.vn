<!-- Modal -->
<div class="modal custom_modal fade" id="replyCommentModal" tabindex="-1" role="dialog" aria-labelledby="replyCommentModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 25px" id="replyCommentModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="replyCommentForm">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                        <textarea class="form-control"
                                  name="reply_comment_content"
                                  style="resize: none"
                                  rows="2"></textarea>
                            </div>
                        </div>
                        @if(!auth()->check())
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="reply_comment_gender_male" name="reply_comment_gender"
                                               checked
                                               value="male"
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="reply_comment_gender_male">Anh</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="reply_comment_gender_female" name="reply_comment_gender"
                                               value="female"
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="reply_comment_gender_female">Chị</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="reply_comment_name" type="text" class="form-control" placeholder="Nhập họ tên"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="reply_comment_phone" type="tel" class="form-control" placeholder="Nhập số điện thoại"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="reply_comment_email" type="email" class="form-control"
                                           placeholder="Nhập email (để nhận thông báo phản hồi)"/>
                                </div>
                            </div>
{{--                            <div class="col-md-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="reply_created_at">Ngày tạo:</label>--}}
{{--                                    <input name="reply_created_at" id="reply_created_at"--}}
{{--                                           value="{{ date('Y-m-d H:i:s') }}"--}}
{{--                                           type="datetime-local" class="form-control" />--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        @endif
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnSubmitReplyComment" type="button" class="btn btn-primary">Hoàn tất</button>
            </div>
        </div>
    </div>
</div>
