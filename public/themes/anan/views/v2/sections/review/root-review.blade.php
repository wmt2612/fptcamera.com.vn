<div id="root-review">
    <div class="fpt-comment">
        <div class="">
            <div class="card st-card card-md user-rate">
                <div class="card-title"><h3 class="h5 heading">Đánh giá sản phẩm </h3></div>
                <div class="card-body">
                    <div class="user-rate__box">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="star">
                                    <div class="text f-s-p-16">Đánh Giá Trung Bình</div>
                                    <div id="avgRating" class="f-s-ui-44 text-primary f-w-500 m-t-4"></div>
                                    <ul id="avgRatingStar" class="list-star m-t-4 review-star">

                                    </ul>
                                    <div id="totalRating" class="text text-grayscale m-t-4"></div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div id="ratingProgress" class="progress-block">
                                    <div class="progress-block__line rating-bar-5">
                                        <span class="text">5</span><span
                                            class="cm-ic-star cm-ic-color-warning cm-ic-xs m-x-4"></span>
                                        <div class="progress progress-success progress-sm progress-line">
                                            <div class="progress-bar" style="width: 0%;"></div>
                                        </div>
                                        <span class="text m-l-4 rating-count">0</span>
                                    </div>
                                    <div class="progress-block__line rating-bar-4"><span class="text">4</span><span
                                            class="cm-ic-star cm-ic-color-warning cm-ic-xs m-x-4"></span>
                                        <div class="progress progress-success progress-sm progress-line">
                                            <div class="progress-bar" style="width: 0%;"></div>
                                        </div>
                                        <span class="text m-l-4 rating-count">0</span></div>
                                    <div class="progress-block__line rating-bar-3"><span class="text">3</span><span
                                            class="cm-ic-star cm-ic-color-warning cm-ic-xs m-x-4"></span>
                                        <div class="progress progress-success progress-sm progress-line">
                                            <div class="progress-bar" style="width: 0%;"></div>
                                        </div>
                                        <span class="text m-l-4 rating-count">0</span></div>
                                    <div class="progress-block__line rating-bar-2"><span class="text">2</span><span
                                            class="cm-ic-star cm-ic-color-warning cm-ic-xs m-x-4"></span>
                                        <div class="progress progress-success progress-sm progress-line">
                                            <div class="progress-bar" style="width: 0%;"></div>
                                        </div>
                                        <span class="text m-l-4 rating-count">0</span></div>
                                    <div class="progress-block__line rating-bar-1"><span class="text">1</span><span
                                            class="cm-ic-star cm-ic-color-warning cm-ic-xs m-x-4"></span>
                                        <div class="progress progress-success progress-sm progress-line">
                                            <div class="progress-bar" style="width: 0%;"></div>
                                        </div>
                                        <span class="text m-l-4 rating-count">0</span></div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="action">
                                    <div class="text">Bạn đã dùng sản phẩm này?</div>
                                    <a class="btn btn-primary btn-lg m-t-8 text-white"
                                       id="btnStartReview">GỬI
                                        ĐÁNH GIÁ</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="user-content">
                        <div class="result">
                            <div class="tags">
                                <div class="text text-grayscale-600">Lọc xem theo:</div>
                                <div class="list">
                                    <div class="badge badge-outline-grayscale badge-xs active" data-sort="1"><i
                                            class="cm-ic-check"></i><span>Mới nhất</span></div>
                                    <div class="badge badge-outline-grayscale badge-xs" data-sort="2"><i
                                            class="cm-ic-check"></i><span>Cũ nhất</span></div>
                                    <div class="badge badge-outline-grayscale badge-xs" data-sort="3" data-rating="5"><i
                                            class="cm-ic-check"></i><span>5 sao</span></div>
                                    <div class="badge badge-outline-grayscale badge-xs" data-sort="4" data-rating="4"><i
                                            class="cm-ic-check"></i><span>4 sao</span></div>
                                    <div class="badge badge-outline-grayscale badge-xs" data-sort="5" data-rating="3"><i
                                            class="cm-ic-check"></i><span>3 sao</span></div>
                                    <div class="badge badge-outline-grayscale badge-xs" data-sort="6" data-rating="2"><i
                                            class="cm-ic-check"></i><span>2 sao</span></div>
                                    <div class="badge badge-outline-grayscale badge-xs" data-sort="7" data-rating="1"><i
                                            class="cm-ic-check"></i><span>1 sao</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="user-wrapper">
                        </div>
                        <div class="pages">
                            <div class="select-device__pagination">
                                <ul id="review-pagination" class="pagination pagination-space">
                                </ul>
                                <ul id="review-pagination-mobile" class="pagination pagination-space">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('v2.sections.review.review-modal')
    @include('v2.sections.review.review-reply-modal')
</div>

