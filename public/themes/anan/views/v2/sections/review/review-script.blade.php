<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const fetchReviewDataParams = {
        sort_by: null,
        sort_type: null,
        filter_by: null,
        filter_value: null,
        page: 1,
        type: "{{ $type }}",
        url: "{{ $url }}",
        post_id: "{{ $post_id }}",
    }
    let totalPage = 1;
    let replyRatingId = 0;
    let PHONE_REGEX = /(84|0[3|5|7|8|9])+([0-9]{8})\b/g;

    function fetchReviewData() {
        $('#review-pagination').html('');
        $('#review-pagination-mobile').html('');
        $.ajax({
            url: "/ratings",
            type: 'GET',
            data: fetchReviewDataParams,
            success: function (res) {
                const ratings = res.data ?? [];
                console.log('ratings', ratings);
                totalPage = res.last_page;
                $('#root-review .user-wrapper').html('');
                ratings?.map((rating, index) => {
                    $('#root-review .user-wrapper').append(`
                            <div class="user-block">
                                <div class="avatar avatar-md avatar-text avatar-circle">
                                    <div class="avatar-shape">
                                          ${
                        rating.user?.avatar_url
                            ? `<div class="avatar-shape comment-user-avatar">
                                                                <img src=${rating.user.avatar_url} width="60px" />
                                                            </div>`
                            :
                            `<div class="avatar-shape"><span class="f-s-p-20 f-w-500">${rating.avt_letters}</span></div>`
                    }
                                    </div>
                                    <div class="avatar-info">
                                        <div class="avatar-name">
                                            <div class="text">${rating.customer_name}</div>
                                            ${
                        rating.is_admin ?
                            `<span class="badge badge-grayscale badge-xxs m-l-4 badge-orange">Quản trị viên</span>`
                            : ``
                    }
                                        </div>
                                        <div class="avatar-rate">
                                            <ul class="list-star m-t-4 review-star">
                                                <li class="fpt-review-star">
                                                    <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                        <g transform="translate(0 -1028.4)">
                                                            <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="${rating.rating >= 1 ? '#f39c12' : 'rgb(139, 136, 136)'}"/>
                                                            <path d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z"
                                                                  fill="${rating.rating >= 1 ? '#f1c40f' : 'rgb(139, 136, 136)'}   "/>
                                                        </g>
                                                    </svg>
                                                </li>
                                                <li class="fpt-review-star">
                                                    <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                        <g transform="translate(0 -1028.4)">
                                                            <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="${rating.rating >= 2 ? '#f39c12' : 'rgb(139, 136, 136)'}"/>
                                                            <path d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z"
                                                                  fill="${rating.rating >= 2 ? '#f1c40f' : 'rgb(139, 136, 136)'}   "/>
                                                        </g>
                                                    </svg>
                                                </li>
                                                <li class="fpt-review-star">
                                                    <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                        <g transform="translate(0 -1028.4)">
                                                            <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="${rating.rating >= 3 ? '#f39c12' : 'rgb(139, 136, 136)'}"/>
                                                            <path d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z"
                                                                  fill="${rating.rating >= 3 ? '#f1c40f' : 'rgb(139, 136, 136)'}   "/>
                                                        </g>
                                                    </svg>
                                                </li>
                                                <li class="fpt-review-star">
                                                    <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                        <g transform="translate(0 -1028.4)">
                                                            <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="${rating.rating >= 4 ? '#f39c12' : 'rgb(139, 136, 136)'}"/>
                                                            <path d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z"
                                                                  fill="${rating.rating >= 4 ? '#f1c40f' : 'rgb(139, 136, 136)'}   "/>
                                                        </g>
                                                    </svg>
                                                </li>
                                                <li class="fpt-review-star">
                                                    <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                        <g transform="translate(0 -1028.4)">
                                                            <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="${rating.rating >= 5 ? '#f39c12' : 'rgb(139, 136, 136)'}"/>
                                                            <path d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z"
                                                                  fill="${rating.rating >= 5 ? '#f1c40f' : 'rgb(139, 136, 136)'}   "/>
                                                        </g>
                                                    </svg>
                                                </li>
                                            </ul>
                                         </div>
                                         <div class="avatar-para">
                                            <div class="text">
                                                 ${rating.review}
                                            </div>
                                            ${
                                                rating.photos.length > 0
                                                ? `
                                                <div class="review-photos">
                                                    ${rating.photos.map(photo => (
                                                       ` <div class="review-photo-item">
                                                            <img alt="review-photo" src="${photo.path}"/>
                                                        </div>`
                                                    ))}
                                                </div>
                                                ` : ''
                                             }

                                        </div>
                                        <div class="avatar-time">
                                            <div class="text text-grayscale">${rating.created_at}</div>
                                            <i class="cm-ic-circle-sm"></i>
                                            <div class="link link-xs btn-like-review" data-total_like="${rating.total_like}" data-rating_id="${rating.id}">Thích ${rating.total_like > 0 ? `(${rating.total_like})` : ''}</div>
                                            <i class="cm-ic-circle-sm"></i>
                                            <div class="link link-xs btn-reply-review" aria-controls="comment-reply-invalid"
                                                data-rating_id="${rating.id}"
                                                data-reply_name="${rating.customer_name}"
                                                >Trả lời
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                `);

                    rating.replies?.map((reply, i) => {
                        $('#root-review .user-wrapper').append(`
                         <div class="user-block reply">
                            <div class="avatar avatar-md avatar-text avatar-circle">
                                <div class="avatar-shape">
                            ${
                            reply.is_admin ?
                                `<img class="avt-admin" src="${reply.user.avatar_url ?? reply.avt_letters}" />`
                                : reply.user?.avatar_url ?
                                    `<img src=${reply.user.avatar} width="60px" />`
                                    : `<span class="f-s-p-20 f-w-500">${reply.avt_letters}</span>`
                        }
                        </div>
                        <div class="avatar-info">
                            <div class="avatar-name">
                                <div class="text">${reply.customer_name}</div>
                        ${
                            reply.is_admin ?
                                `<span class="badge badge-grayscale badge-xxs m-l-4 badge-orange">Quản trị viên</span>`
                                : ``
                        }
                        </div>
                        <div class="avatar-para">
                            <div class="text"><p>${reply.review}</p></div>
                                    </div>
                                    <div class="avatar-time">
                                            <div class="text text-grayscale">${reply.created_at}</div>
                                            <i class="cm-ic-circle-sm"></i>
                                            <div class="link link-xs btn-like-review" data-total_like="${reply.total_like}" data-rating_id="${reply.id}">Thích ${reply.total_like > 0 ? `(${reply.total_like})` : ''}</div>
                                            <i class="cm-ic-circle-sm"></i>
                                            <div class="link link-xs btn-reply-review" aria-controls="comment-reply-invalid"
                                                data-rating_id="${rating.id}"
                                                data-reply_name="${reply.customer_name}"
                                                >Trả lời
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        `)
                    })

                });

                if (totalPage > 1) {
                    res.links.map((link, index) => {
                        let label = link.label;
                        if (index == 0) {
                            $('#review-pagination').append(`
                                  <li class="pagination-item ${link.active ? 'active' : ''}" data-page="${label}">
                                        <a href="#" class="pagination-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="arrow"><path fill="#134563" d="M37.9 46 24.1 32.3l13.8-13.7 2 2-11.8 11.7L39.9 44l-2 2"></path></svg>
                                        </a>
                                    </li>

                                `
                            )

                            $('#review-pagination-mobile').append(`
                                  <li class="pagination-item ${link.active ? 'active' : ''}" data-page="${label}">
                                        <a href="#" class="pagination-link ${res.current_page == 1 ? 'disabled' : ''}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="arrow"><path fill="#134563" d="M37.9 46 24.1 32.3l13.8-13.7 2 2-11.8 11.7L39.9 44l-2 2"></path></svg>
                                        </a>
                                    </li>

                                `)

                        } else if (index == res.links.length - 1) {
                            $('#review-pagination').append(`
                              <li class="pagination-item ${link.active ? 'active' : ''}" data-page="${label}"><a href="#" class="pagination-link">
                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 64 64" viewBox="0 0 64 64" id="arrow"><path fill="#134563" d="m-210.9-289-2-2 11.8-11.7-11.8-11.7 2-2 13.8 13.7-13.8 13.7" transform="translate(237 335)"></path></svg>
                                </a></li>

                            `
                            )

                            $('#review-pagination-mobile').append(`
                              <li class="pagination-item ${link.active ? 'active' : ''}" data-page="${label}">
                                <a href="#" class="pagination-link ${res.current_page == res.last_page ? 'disabled' : ''}">
                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 64 64" viewBox="0 0 64 64" id="arrow"><path fill="#134563" d="m-210.9-289-2-2 11.8-11.7-11.8-11.7 2-2 13.8 13.7-13.8 13.7" transform="translate(237 335)"></path></svg>
                                </a></li>

                            `
                            )
                        } else {
                            $('#review-pagination').append(`
                              <li class="pagination-item ${link.active ? 'active' : ''}" data-page="${label}"><a href="#" class="pagination-link">${label}</a></li>

                            `
                            )
                        }

                    });
                }

                if (res.data.length == 0) {
                    $('#root-review .user-wrapper').html(`
                            <div class="text-center">Chưa có đánh giá nào phù hợp</div>
                        `);
                }

            },
            error: function (err) {
            }
        });
    }

    function fetchOverviewReview() {
        $.ajax({
            url: "/ratings/overview",
            data: {
                type: "{{ $type }}",
                url: "{{ $url }}",
                post_id: "{{ $post_id }}",
            },
            type: 'GET',
            success: function (res) {
                $('#avgRating').html(`${res.avg_rating}/5`);
                $('#totalRating').html(`${res.total_rating} lượt đánh giá`);

                res.details?.map((item, index) => {
                    $(`#ratingProgress .rating-bar-${item.rating} span.rating-count`).html(item.count);
                    $(`#ratingProgress .rating-bar-${item.rating} .progress-bar`).css('width', item.percent + '%');
                })


                $('#avgRatingStar').html(`
                      <li class="fpt-review-star">
                                                    <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                        <g transform="translate(0 -1028.4)">
                                                            <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="${res.avg_rating >= 1 ? '#f39c12' : 'rgb(139, 136, 136)'}"/>
                                                            <path d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z"
                                                                  fill="${res.avg_rating >= 1 ? '#f1c40f' : 'rgb(139, 136, 136)'}   "/>
                                                        </g>
                                                    </svg>
                                                </li>
                                                <li class="fpt-review-star">
                                                    <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                        <g transform="translate(0 -1028.4)">
                                                            <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="${res.avg_rating >= 2 || res.avg_rating > 1.5 ? '#f39c12' : 'rgb(139, 136, 136)'}"/>
                                                            <path d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z"
                                                                  fill="${res.avg_rating >= 2 || res.avg_rating > 1.5 ? '#f1c40f' : 'rgb(139, 136, 136)'}   "/>
                                                        </g>
                                                    </svg>
                                                </li>
                                                <li class="fpt-review-star">
                                                    <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                        <g transform="translate(0 -1028.4)">
                                                            <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="${res.avg_rating >= 3 || res.avg_rating > 2.5 ? '#f39c12' : 'rgb(139, 136, 136)'}"/>
                                                            <path d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z"
                                                                  fill="${res.avg_rating >= 3 || res.avg_rating > 2.5 ? '#f1c40f' : 'rgb(139, 136, 136)'}   "/>
                                                        </g>
                                                    </svg>
                                                </li>
                                                <li class="fpt-review-star">
                                                    <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                        <g transform="translate(0 -1028.4)">
                                                            <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="${res.avg_rating >= 4 || res.avg_rating > 3.5 ? '#f39c12' : 'rgb(139, 136, 136)'}"/>
                                                            <path d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z"
                                                                  fill="${res.avg_rating >= 4 || res.avg_rating > 3.5 ? '#f1c40f' : 'rgb(139, 136, 136)'}   "/>
                                                        </g>
                                                    </svg>
                                                </li>
                                                <li class="fpt-review-star">
                                                    <svg width="800px" height="800px" viewBox="0 0 24 24" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                        <g transform="translate(0 -1028.4)">
                                                            <path d="m12 1028.4 4 9 8 1-6 5 2 9-8-5-8 5 2-9-6-5 8-1z" fill="${res.avg_rating >= 5 || res.avg_rating > 4.5 ? '#f39c12' : 'rgb(139, 136, 136)'}"/>
                                                            <path d="m12 1028.4-4 9-6.9688 0.8 4.9688 4.2-0.1875 0.8 0.1875 0.2-1.75 7.8 7.75-4.8 7.75 4.8-1.75-7.8 0.188-0.2-0.188-0.8 4.969-4.2-6.969-0.8-4-9z"
                                                                  fill="${res.avg_rating >= 5 || res.avg_rating > 4.5 ? '#f1c40f' : 'rgb(139, 136, 136)'}   "/>
                                                        </g>
                                                    </svg>
                                                </li>
                    `)
            }
        })
    }

    function scrollToReview() {
        $([document.documentElement, document.body]).animate({
            scrollTop: $(".fpt-comment").offset().top
        }, 500);
    }

    function likeReview(ratingId) {
        $.ajax({
            url: `/ratings/${ratingId}/like`,
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function (res) {
                console.log(res);
            }
        })
    }

    $(document).ready(function () {
        fetchOverviewReview();
        fetchReviewData();

        $('#btnStartReview').click(function (e) {
            e.preventDefault();
            $('#reviewModal').modal('show');
        })

        $('.user-content .badge-outline-grayscale').click(function () {
            $('.user-content .active').removeClass('active');
            $(this).addClass('active');
            const dataSort = $(this).data('sort');
            const rating = $(this).data('rating');
            if (dataSort == 1) {
                fetchReviewDataParams.sort_by = 'created_at';
                fetchReviewDataParams.sort_type = 'desc';
                fetchReviewDataParams.page = 1;
                fetchReviewDataParams.filter_by = null;
            }
            if (dataSort == 2) {
                fetchReviewDataParams.sort_by = 'created_at';
                fetchReviewDataParams.sort_type = 'asc';
                fetchReviewDataParams.page = 1;
                fetchReviewDataParams.filter_by = null;
            }
            if (dataSort > 2) {
                fetchReviewDataParams.sort_by = 'created_at';
                fetchReviewDataParams.sort_type = 'desc';
                fetchReviewDataParams.filter_by = 'rating';
                fetchReviewDataParams.filter_value = rating;
                fetchReviewDataParams.page = 1;
            }
            scrollToReview();
            fetchReviewData();
        });

        $(document).on('click', '#review-pagination .pagination-item', function (e) {
            e.preventDefault();
            let page = $(this).data('page');
            scrollToReview();
            if (page == 'pagination.previous' && fetchReviewDataParams.page > 1) {
                fetchReviewDataParams.page -= 1;
                fetchReviewData();
            } else if (page == 'pagination.next' && fetchReviewDataParams.page < totalPage) {
                fetchReviewDataParams.page += 1;
                fetchReviewData();
            } else if (typeof page == 'number') {
                fetchReviewDataParams.page = page;
                fetchReviewData();
            }
        });

        $(document).on('click', '#review-pagination-mobile .pagination-item', function (e) {
            e.preventDefault();
            let page = $(this).data('page');
            scrollToReview();
            if (page == 'pagination.previous' && fetchReviewDataParams.page > 1) {
                fetchReviewDataParams.page -= 1;
                fetchReviewData();
            } else if (page == 'pagination.next' && fetchReviewDataParams.page < totalPage) {
                fetchReviewDataParams.page += 1;
                fetchReviewData();
            } else if (typeof page == 'number') {
                fetchReviewDataParams.page = page;
                fetchReviewData();
            }
        });

        const customerInfo = JSON.parse(localStorage.getItem('customer_info'));
        if (customerInfo) {
            if (customerInfo.gender == 'male') {
                $('#genderMale').prop('checked', true);
            } else {
                $('#genderFemale').prop('checked', true);
            }
            $('input[name=customer_name]').val(customerInfo.name);
            $('input[name=customer_phone]').val(customerInfo.phone);
            $('input[name=customer_email]').val(customerInfo.email);
        }

        $(document).on('click', '.btn-like-review', function (e) {
            e.preventDefault();
            const totalLike = $(this).data('total_like');
            const ratingId = $(this).data('rating_id');
            likeReview(ratingId);
            $(this).html(`Thích (${totalLike + 1})`);
        });

        $(document).on('click', '.btn-reply-review', function (e) {
            e.preventDefault();
            const ratingId = $(this).data('rating_id');
            const replyName = $(this).data('reply_name');
            replyRatingId = ratingId;
            $('#reviewReplyModalTitle').html(`Trả lời "${replyName}"`);
            $('#reviewReplyModal textarea').val(`@${replyName}  `);
            const customerInfo = JSON.parse(localStorage.getItem('customer_info'));
            if (customerInfo) {
                $('input[name=reply_gender]').val(customerInfo.gender);
                $('input[name=reply_name]').val(customerInfo.name);
                $('input[name=reply_phone]').val(customerInfo.phone);
                $('input[name=reply_email]').val(customerInfo.email);
            }
            $('#reviewReplyModal').modal('show');
        })
    })
</script>
<script>
    let rating = 5;

    $(document).ready(function () {
        $('#select-star li').hover(function () {
            const label = $(this).data('label');
            rating = $(this).data('rating');
            $('#star-desc').text(label);

            for (let i = rating + 1; i <= 5; i++) {
                $(`#select-star li:nth-child(${i}) path`).css('fill', '#8b8888');
            }

            for (let i = rating; i >= 1; i--) {
                $(`#select-star li:nth-child(${i}) path`).css('fill', 'rgb(241, 196, 15)');
            }

        });

        $('#btnReviewComplete').click(function () {
            $("#reviewForm").submit();
        })

        $('#btnSubmitReplyReview').click(function () {
            $("#reviewReplyModal").submit();
        })

        $.validator.addMethod(
            "regex",
            function (value, element, regexp) {
                const re = new RegExp(regexp);
                return this.optional(element) || re.test(value);
            },
            "Please check your input."
        );

        let reviewPhotos = [];

        $("#reviewForm").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            submitHandler: function (form) {
                if ($('#saveReviewInfo').is(':checked')) {
                    localStorage.setItem('customer_info', JSON.stringify({
                        gender: $('input[name=gender]:checked').val(),
                        name: $('input[name=customer_name]').val(),
                        email: $('input[name=customer_email]').val(),
                        phone: $('input[name=customer_phone]').val(),
                    }));
                } else {
                    localStorage.removeItem('customer_info');
                }

                const formData = new FormData();
                // Thêm CSRF token
                formData.append('_token', "{{ csrf_token() }}");

                // Thêm các trường dữ liệu khác
                formData.append('rating', rating);
                formData.append('customer_gender', $('input[name=gender]:checked').val());
                formData.append('customer_name', $('input[name=customer_name]').val());
                formData.append('customer_email', $('input[name=customer_email]').val());
                formData.append('customer_phone', $('input[name=customer_phone]').val());
                formData.append('review', $('textarea[name=review]').val());
                formData.append('type', "{{ $type }}");
                formData.append('url', "{{ $url }}");
                formData.append('post_id', "{{ $post_id }}");

                // Thêm danh sách ảnh (nếu có)
                $.each(reviewPhotos, function(i, file) {
                    formData.append('upload_files[]', file);
                });

                $.ajax({
                    type: "POST",
                    url: '/ratings',
                    processData: false,  // Ngăn jQuery xử lý dữ liệu
                    contentType: false,  // Ngăn jQuery thiết lập Content-Type
                    data: formData,
                    success: function (res) {
                        $('#reviewModal').modal('hide');
                        scrollToReview();
                        fetchReviewData();
                        fetchOverviewReview();
                        Swal.fire({
                            title: 'Cảm ơn bạn đã gửi đánh giá!',
                            text: 'Chúng tôi sẽ xét duyệt đánh giá của bạn sớm nhất có thể',
                            icon: 'success',
                            confirmButtonText: 'Xong'
                        })
                    },
                    error: function (err) {
                        console.log(err)
                    }
                });
            },
            rules: {
                "review": {
                    required: true,
                },
                "customer_name": {
                    required: true,
                },
                "customer_phone": {
                    required: true,
                    regex: /(84|0[3|5|7|8|9])+([0-9]{8})\b/g
                },
                "customer_email": {
                    required: true,
                    email: true,
                },
            },
            messages: {
                "review": {
                    required: "Nội dung không được để trống",
                },
                "customer_name": {
                    required: "Họ và tên không được để trống",
                },
                "customer_phone": {
                    required: "Số điện thoại không được để trống",
                    regex: 'Số điện thoại không đúng định dạng'
                },
                "customer_email": {
                    required: "Email không được để trống",
                    email: 'Email không đúng định dạng'
                },
            }
        });

        $("#reviewReplyModal").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            submitHandler: function (form) {

                localStorage.setItem('customer_info', JSON.stringify({
                    gender: $('input[name=reply_gender]:checked').val(),
                    name: $('input[name=reply_name]').val(),
                    email: $('input[name=reply_email]').val(),
                    phone: $('input[name=reply_phone]').val(),
                }));

                $.ajax({
                    type: "POST",
                    url: `/ratings/${replyRatingId}/reply`,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        customer_gender: $('input[name=reply_gender]:checked').val(),
                        customer_name: $('input[name=reply_name]').val(),
                        customer_email: $('input[name=reply_email]').val(),
                        customer_phone: $('input[name=reply_phone]').val(),
                        review: $('textarea[name=reply_review]').val(),
                        type: 1,
                    },
                    success: function (res) {
                        $('#reviewReplyModal').modal('hide');
                        scrollToReview();
                        fetchReviewData();
                        fetchOverviewReview();
                        Swal.fire({
                            title: 'Cảm ơn bạn đã gửi câu trả lời!',
                            text: 'Chúng tôi sẽ xét duyệt câu trả lời của bạn sớm nhất có thể',
                            icon: 'success',
                            confirmButtonText: 'Xong'
                        })
                    },
                    error: function (err) {
                        console.log(err)
                    }
                });
            },
            rules: {
                "reply_review": {
                    required: true,
                },
                "reply_name": {
                    required: true,
                },
                "reply_phone": {
                    required: true,
                    regex: /(84|0[3|5|7|8|9])+([0-9]{8})\b/g
                },
                "reply_email": {
                    required: true,
                    email: true,
                },
            },
            messages: {
                "reply_review": {
                    required: "Nội dung không được để trống",
                },
                "reply_name": {
                    required: "Họ và tên không được để trống",
                },
                "reply_phone": {
                    required: "Số điện thoại không được để trống",
                    regex: 'Số điện thoại không đúng định dạng'
                },
                "reply_email": {
                    required: "Email không được để trống",
                    email: 'Email không đúng định dạng'
                },
            }
        });

        $('#btnCloseReviewModal').click(function (e) {
            e.preventDefault();
            $('#reviewModal').modal('toggle');
        })

        $('.reviewPhotos').on('click', '.reviewPhotoItem', function(e) {
            e.preventDefault();
            $('#imageUpload').click()
        });

        $('.reviewPhotos').on('click', '.removeReviewPhotoItem', function(e) {
            e.stopPropagation();
            $(this).parent().remove();

            if ($('.reviewPhotos').children().length < 6) {
                $('.reviewPhotos').append(`
                 <div class="reviewPhotoItem">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                    </svg>
                </div>
            `);
            }
        });

        let checkAppendImageUpload = false;
        $('.btnSendReviewPhoto').click(function(e) {
            e.preventDefault();
            $('#imageUpload').click()

            if (!checkAppendImageUpload) {
                $('.reviewPhotos').append(`
                 <div class="reviewPhotoItem">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                    </svg>
                </div>
            `);
            }
            checkAppendImageUpload = true;
        });

        $('#imageUpload').change(function() {
            const file = this.files[0];
            const uploadedImages = $('.reviewPhotos').children().length;
            if (file && uploadedImages < 6) {
                reviewPhotos.push(file);
                // Create an object URL from the file and set it as the source for the preview image
                const imageUrl = URL.createObjectURL(file);
                $('.reviewPhotos').prepend(`
                      <div class="reviewPhotoItem">
                           <img alt="photo" src="${imageUrl}"/>
                            <div class="removeReviewPhotoItem">
                               <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                   <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                               </svg>
                           </div>
                      </div>
                `);
            }

            if ($('.reviewPhotos').children().length >= 6) {
                $('.reviewPhotos').children().last().remove();
            }
        });
    })
</script>
