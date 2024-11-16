<!-- Modal -->
<div class="modal custom_modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 25px" id="commentModalTitle">Thông tin người gửi</h5>
                <button type="button" class="close" id="btnCloseCommentModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="commentForm">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="comment_gender_male" name="comment_gender"
                                           checked
                                           value="male"
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="comment_gender_male">Anh</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="comment_gender_female" name="comment_gender"
                                           value="female"
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="comment_gender_female">Chị</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="comment_name" type="text" class="form-control" placeholder="Nhập họ tên"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="comment_phone" type="tel" class="form-control" placeholder="Nhập số điện thoại"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="comment_email" type="email" class="form-control"
                                       placeholder="Nhập email (để nhận thông báo phản hồi)"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnSubmitCommentForm" type="button" class="btn btn-primary">Hoàn tất</button>
            </div>
        </div>
    </div>
</div>
