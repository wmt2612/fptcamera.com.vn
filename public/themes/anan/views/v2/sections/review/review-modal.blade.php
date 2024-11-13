<!-- Modal -->
<div class="modal custom_modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" style="font-size: 25px" id="reviewModalLongTitle">Đánh giá sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnCloseReviewModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column justify-content-center align-items-center" style="gap: 10px">
                    <ul id="select-star" class="list-star m-t-4 review-star" style="gap: 10px">
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
                @if(auth()->check())
                    <div style="margin-top: 10px;margin-bottom: 10px; gap: 10px; align-items: center" class="d-flex">
                        <p style="font-size: 16px">Xin chào, <b>{{ auth()->user()->full_name }}</b></p>
                        <a class="btnChangeAccount" href="" style="color: blue">[Thay đổi]</a>
                    </div>
                @endif
                <form action="#" id="reviewForm">
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
                            <div class="mb-2">
                                <button type="button" class="btn btn-primary btnSendReviewPhoto">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24"> <path fill-rule="evenodd" d="M7.5 4.586A2 2 0 0 1 8.914 4h6.172a2 2 0 0 1 1.414.586L17.914 6H19a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h1.086L7.5 4.586ZM10 12a2 2 0 1 1 4 0 2 2 0 0 1-4 0Zm2-4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z" clip-rule="evenodd"/> </svg>
                                    <span>Gửi hình ảnh thực tế</span>
                                </button>
                                <input type="file" id="imageUpload" accept="image/*" style="display: none;">
                                <div class="d-flex gap-3 reviewPhotos">
                                </div>
                            </div>
                        </div>
                        @auth()
                        @else
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customerGenderMale" name="gender"
                                               value="male"
                                               checked
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customerGenderMale">Anh</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customerGenderFemale" name="gender"
                                               value="female"
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="customerGenderFemale">Chị</label>
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
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="saveReviewInfo" name="saveReviewInfo">
                                        <label class="form-check-label" for="saveReviewInfo">
                                            Lưu tên, SĐT và email của tôi trên trình duyệt này
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endauth

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnReviewComplete" type="button" class="btn btn-primary">Hoàn tất</button>
            </div>
        </div>
    </div>
</div>
