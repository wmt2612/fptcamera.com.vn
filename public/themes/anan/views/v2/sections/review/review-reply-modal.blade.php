<!-- Modal -->
<div class="modal custom_modal fade" id="reviewReplyModal" tabindex="-1" role="dialog" aria-labelledby="reviewReplyModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 25px" id="reviewReplyModalTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="replyReviewForm">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                        <textarea class="form-control"
                                  name="reply_review"
                                  style="resize: none"
                                  rows="2"
                        ></textarea>
                            </div>
                        </div>
                        @auth()
                        @else
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="male" name="reply_gender"
                                               checked
                                               value="male"
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="male">Anh</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="female" name="reply_gender"
                                               value="female"
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="female">Chị</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="reply_name" type="text" class="form-control" placeholder="Nhập họ tên"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="reply_phone" type="tel" class="form-control" placeholder="Nhập số điện thoại"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="reply_email" type="email" class="form-control"
                                           placeholder="Nhập email (để nhận thông báo phản hồi)"/>
                                </div>
                            </div>
                        @endauth

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnSubmitReplyReview" type="button" class="btn btn-primary">Hoàn tất</button>
            </div>
        </div>
    </div>
</div>
