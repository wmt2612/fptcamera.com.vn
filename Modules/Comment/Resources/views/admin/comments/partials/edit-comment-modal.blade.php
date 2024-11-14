<!-- Modal -->
<div class="modal fade" id="editCommentModal" tabindex="-1" role="dialog" aria-labelledby="editCommentModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 25px" id="editCommentModalLongTitle">Chỉnh sửa bình luận</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="editCommentForm">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                        <textarea class="form-control"
                                  name="content"
                                  style="resize: none"
                                  rows="2"
                        ></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group" style="display: flex; align-items: center; gap: 10px">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="genderMale" name="gender"
                                           value="male"
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="genderMale">Anh</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="genderFemale" name="gender"
                                           value="female"
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="genderFemale">Chị</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="customer_name" type="text" class="form-control" placeholder="Nhập họ tên"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="customer_phone" type="tel" class="form-control" placeholder="Nhập số điện thoại"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="customer_email" type="email" class="form-control"
                                       placeholder="Nhập email (để nhận thông báo phản hồi)"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="created_at">Ngày tạo:</label>
                                <input name="created_at" id="created_at" type="datetime-local" class="form-control" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnSubmitEditComment" type="button" class="btn btn-primary">Hoàn tất</button>
            </div>
        </div>
    </div>
</div>
