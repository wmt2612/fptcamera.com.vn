<!-- Modal -->
<div class="modal fade" id="editReviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 25px" id="reviewModalLongTitle">Chỉnh sửa đánh giá</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column justify-content-center align-items-center" ]
                     style="display: flex; justify-content: center; align-items: center; flex-direction: column; gap: 10px; margin-bottom: 20px">
                    <ul id="edit-select-star" class="list-star m-t-4 review-star" style="gap: 10px">
                        <li data-label="Không thích" data-rating="1">
                            <svg width="30px" height="30px" viewBox="0 0 24 24"
                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                 xmlns="http://www.w3.org/2000/svg" version="1.1"
                                 xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/"
                                 style="cursor: pointer"
                            >
                                <g transform="translate(0 -1028.4)">
                                    <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="#f39c12"/>
                                    <path
                                        d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z"
                                        fill="#f1c40f"/>
                                </g>
                            </svg>
                        </li>
                        <li data-label="Tạm được" data-rating="2">
                            <svg width="30px" height="30px" viewBox="0 0 24 24"
                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                 xmlns="http://www.w3.org/2000/svg" version="1.1"
                                 xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/"
                                 style="cursor: pointer"
                            >
                                <g transform="translate(0 -1028.4)">
                                    <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="#f39c12"/>
                                    <path
                                        d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z"
                                        fill="#f1c40f"/>
                                </g>
                            </svg>
                        </li>
                        <li data-label="Bình thường" data-rating="3">
                            <svg width="30px" height="30px" viewBox="0 0 24 24"
                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                 xmlns="http://www.w3.org/2000/svg" version="1.1"
                                 xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/"
                                 style="cursor: pointer"
                            >
                                <g transform="translate(0 -1028.4)">
                                    <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="#f39c12"/>
                                    <path
                                        d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z"
                                        fill="#f1c40f"/>
                                </g>
                            </svg>
                        </li>
                        <li data-label="Hài lòng" data-rating="4">
                            <svg width="30px" height="30px" viewBox="0 0 24 24"
                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                 xmlns="http://www.w3.org/2000/svg" version="1.1"
                                 xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/"
                                 style="cursor: pointer"
                            >
                                <g transform="translate(0 -1028.4)">
                                    <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="#f39c12"/>
                                    <path
                                        d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z"
                                        fill="#f1c40f"/>
                                </g>
                            </svg>
                        </li>
                        <li data-label="Tuyệt vời" data-rating="5">
                            <svg width="30px" height="30px" viewBox="0 0 24 24"
                                 xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                 xmlns="http://www.w3.org/2000/svg" version="1.1"
                                 xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/"
                                 style="cursor: pointer"
                            >
                                <g transform="translate(0 -1028.4)">
                                    <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="#f39c12"/>
                                    <path
                                        d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z"
                                        fill="#f1c40f"/>
                                </g>
                            </svg>
                        </li>
                    </ul>
                    <p id="star-desc">Tuyệt vời</p>
                </div>
                <form action="#" id="editReviewForm">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                        <textarea class="form-control"
                                  name="review"
                                  style="resize: none"
                                  placeholder="Hãy chia sẻ cảm nhận của bạn về sản phẩm"
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
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnSubmitEditReview" type="button" class="btn btn-primary">Hoàn tất</button>
            </div>
        </div>
    </div>
</div>
