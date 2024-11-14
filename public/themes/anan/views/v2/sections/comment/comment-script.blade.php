<script>
    const params = {
        sort_by: null,
        sort_type: null,
        filter_by: null,
        filter_value: null,
        page: 1,
        type: "{{ $type }}",
        url: "{{ $url }}",
        post_id: "{{ $post_id }}",
        keyword: null,
    }
    let totalCommentPage = 1;
    let replyCommentId = 0;
    let replyTo = 0;

    function scrollToComment() {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#root-comment").offset().top
        }, 500);
    }

    function fetchCommentData() {
        $.ajax({
            url: "/comments",
            type: 'GET',
            data: params,
            success: function (res) {

                const comments = res.data ?? [];
                totalCommentPage = res.last_page;

                $('#root-comment .user-content #totalComment').html(`
                    <strong>${res.total} lượt bình luận</strong>
                `)

                $('#commentPagination').html('');
                $('#commentPaginationMobile').html('');

                $('#root-comment .user-wrapper').html('');
                comments?.map((comment, index) => {
                    $('#root-comment .user-wrapper').append(`
                            <div class="user-block">
                                <div class="avatar avatar-md avatar-text avatar-circle">

                  <div class="avatar-shape">
                                    ${
                        comment.is_admin ?
                            `<img class="avt-admin" src="${comment.user.avatar_url ?? comment.avt_letters}" />`
                            : comment.user?.avatar_url ?
                                `<img src=${comment.user.avatar_url} width="60px" />`
                                : `<span class="f-s-p-20 f-w-500">${comment.avt_letters}</span>`
                    }
                                </div>

                                    <div class="avatar-info">
                                        <div class="avatar-name">
                                                <div class="text">${comment.customer_name}</div>
                                                ${
                        comment.is_admin ?
                            `<span class="badge badge-grayscale badge-xxs m-l-4 badge-orange">Quản trị viên</span>`
                            : ``
                    }

                                        </div>
                                         <div class="avatar-para">
                                            <div class="text">
                                                 ${comment.content}
                                            </div>
                                        </div>
                                        <div class="avatar-time">
                                            <div class="text text-grayscale">${comment.created_at}</div>
                                            <i class="cm-ic-circle-sm"></i>
                                            <div class="link link-xs btn-like-comment" data-total_like="${comment.total_like}" data-comment_id="${comment.id}">Thích ${comment.total_like > 0 ? `(${comment.total_like})` : ''}</div>
                                            <i class="cm-ic-circle-sm"></i>
                                            <div class="link link-xs btn-reply-comment" aria-controls="comment-reply-invalid"
                                                data-comment_id="${comment.id}"
                                                data-reply_to="${comment.id}"
                                                data-reply_name="${comment.customer_name}"
                                                >Trả lời
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                `);

                    comment.replies?.map((reply, i) => {
                        $('#root-comment .user-wrapper').append(`
                         <div class="user-block reply">
                            <div class="avatar avatar-md avatar-text avatar-circle">
                                <div class="avatar-shape">
                                    ${
                            reply.is_admin ?
                                `<img class="avt-admin" src="${reply.user.avatar_url ?? reply.avt_letters}" />`
                                : reply.user?.avatar_url ?
                                    `<img src=${reply.user.avatar_url} width="60px" />`
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
                            <div class="text"><p>${reply.content}</p></div>
                                    </div>
                                    <div class="avatar-time">
                                            <div class="text text-grayscale">${reply.created_at}</div>
                                            <i class="cm-ic-circle-sm"></i>
                                            <div class="link link-xs btn-like-comment" data-total_like="${reply.total_like}" data-comment_id="${reply.id}">Thích ${reply.total_like > 0 ? `(${reply.total_like})` : ''}</div>
                                            <i class="cm-ic-circle-sm"></i>
                                            <div class="link link-xs btn-reply-comment" aria-controls="comment-reply-invalid"
                                                data-comment_id="${comment.id}"
                                                data-reply_to="${reply.id}"
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

                if (totalCommentPage > 1) {
                    res.links.map((link, index) => {
                        let label = link.label;
                        if (index == 0) {
                            $('#commentPagination').append(`
                                  <li class="pagination-item ${link.active ? 'active' : ''}" data-page="${label}">
                                        <a href="#" class="pagination-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="arrow"><path fill="#134563" d="M37.9 46 24.1 32.3l13.8-13.7 2 2-11.8 11.7L39.9 44l-2 2"></path></svg>
                                        </a>
                                    </li>

                                `
                            )

                            $('#commentPaginationMobile').append(`
                                  <li class="pagination-item ${link.active ? 'active' : ''}" data-page="${label}">
                                        <a href="#" class="pagination-link ${res.current_page == 1 ? 'disabled' : ''}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="arrow"><path fill="#134563" d="M37.9 46 24.1 32.3l13.8-13.7 2 2-11.8 11.7L39.9 44l-2 2"></path></svg>
                                        </a>
                                    </li>

                                `)

                        } else if (index == res.links.length - 1) {
                            $('#commentPagination').append(`
                              <li class="pagination-item ${link.active ? 'active' : ''}" data-page="${label}"><a href="#" class="pagination-link">
                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 64 64" viewBox="0 0 64 64" id="arrow"><path fill="#134563" d="m-210.9-289-2-2 11.8-11.7-11.8-11.7 2-2 13.8 13.7-13.8 13.7" transform="translate(237 335)"></path></svg>
                                </a></li>

                            `
                            )

                            $('#commentPaginationMobile').append(`
                              <li class="pagination-item ${link.active ? 'active' : ''}" data-page="${label}">
                                <a href="#" class="pagination-link ${res.current_page == res.last_page ? 'disabled' : ''}">
                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 64 64" viewBox="0 0 64 64" id="arrow"><path fill="#134563" d="m-210.9-289-2-2 11.8-11.7-11.8-11.7 2-2 13.8 13.7-13.8 13.7" transform="translate(237 335)"></path></svg>
                                </a></li>

                            `
                            )
                        } else {
                            $('#commentPagination').append(`
                              <li class="pagination-item ${link.active ? 'active' : ''}" data-page="${label}"><a href="#" class="pagination-link">${label}</a></li>

                            `
                            )
                        }

                    });
                }

                if (res.data.length == 0) {
                    $('#root-comment .user-wrapper').html(`
                            <div class="text-center">Chưa có comment nào phù hợp</div>
                        `);
                }

            },
            error: function (err) {
            }
        });
    }

    $(document).ready(function () {
        fetchCommentData();

        $('.btnChangeAccount').click(function (e) {
            e.preventDefault();
            $('#loginModal .modal-title').html('Thay đổi tài khoản');
            $('#loginModal').modal('show');
        })

        $(document).on('click', '#commentPagination .pagination-item', function (e) {
            e.preventDefault();
            let page = $(this).data('page');
            scrollToComment();
            if (page == 'pagination.previous' && params.page > 1) {
                params.page -= 1;
                fetchCommentData();
            } else if (page == 'pagination.next' && params.page < totalPage) {
                params.page += 1;
                fetchCommentData();
            } else if (typeof page == 'number') {
                params.page = page;
                fetchCommentData();
            }
        });

        $(document).on('click', '#commentPaginationMobile .pagination-item', function (e) {
            e.preventDefault();
            let page = $(this).data('page');
            scrollToComment();
            if (page == 'pagination.previous' && params.page > 1) {
                params.page -= 1;
                fetchCommentData();
            } else if (page == 'pagination.next' && params.page < totalPage) {
                params.page += 1;
                fetchCommentData();
            }
        });

        $('#selectCommentSortBy').change(function (e) {
            params.sort_by = 'created_at';
            params.sort_type = $(this).val();
            fetchCommentData();
        })

        function delay(fn, ms) {
            let timer = 0
            return function (...args) {
                clearTimeout(timer)
                timer = setTimeout(fn.bind(this, ...args), ms || 0)
            }
        }

        $('#searchCommentInput').keyup(delay(function () {
            params.keyword = $(this).val();
            fetchCommentData();
        }, 800));

        function likeComment(commentId) {
            $.ajax({
                url: `/comments/${commentId}/like`,
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function (res) {
                    console.log(res);
                }
            })
        }

        $(document).on('click', '.btn-like-comment', function (e) {
            e.preventDefault();
            const totalLike = $(this).data('total_like');
            const commentId = $(this).data('comment_id');
            likeComment(commentId);
            $(this).html(`Thích (${totalLike + 1})`);
        });

        $(document).on('click', '.btn-reply-comment', function (e) {
            e.preventDefault();

            const commentId = $(this).data('comment_id');
            const replyName = $(this).data('reply_name');
            replyCommentId = commentId;
            replyTo = $(this).data('reply_to');
            $('#replyCommentModalTitle').html(`Trả lời "${replyName}"`);
            $('#replyCommentModal textarea').val(`@${replyName}  `);

            const customerInfo = JSON.parse(localStorage.getItem('comment_info'));

            if (customerInfo) {
                $('input[name=reply_comment_gender]').val(customerInfo.gender);
                $('input[name=reply_comment_name]').val(customerInfo.name);
                $('input[name=reply_comment_phone]').val(customerInfo.phone);
                $('input[name=reply_comment_email]').val(customerInfo.email);
            }

            $('#replyCommentModal').modal('show');
        });

    })

</script>

<script>

    $("#sendCommentForm").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        submitHandler: function (form) {

            const commentInfo = JSON.parse(localStorage.getItem('comment_info'));
            if (commentInfo) {
                $('input[name=comment_gender]:checked').val(commentInfo.gender);
                $('input[name=comment_name]').val(commentInfo.name);
                $('input[name=comment_email]').val(commentInfo.email);
                $('input[name=comment_phone]').val(commentInfo.phone);
            }

            @if(auth()->check())
            $.ajax({
                type: "POST",
                url: '/comments',
                data: {
                    "_token": "{{ csrf_token() }}",
                    content: $('textarea[name=comment_content]').val(),
                    type: "{{ $type }}",
                    url: "{{ $url }}",
                    post_id: "{{ $post_id }}",
                },
                success: function (res) {
                    $('textarea[name=comment_content]').val('');

                    fetchCommentData();

                    Swal.fire({
                        title: 'Bình luận thành công!',
                        text: 'Cảm ơn bạn đã gửi bình luận, chúng tôi sẽ xét duyệt và hiển thị ngay sau đó!',
                        icon: 'success',
                        confirmButtonText: 'Xong'
                    })
                },
                error: function (err) {
                    Swal.fire({
                        title: 'Gửi bình luận thất bại',
                        text: 'Vui lòng thử lại sau',
                        icon: 'error',
                        confirmButtonText: 'Thoát'
                    })
                }
            });
            @else
            $('#commentModal').modal('show');
            @endif


        },
        rules: {
            "comment_content": {
                required: true,
            },
        },
        messages: {
            "comment_content": {
                required: "Nội dung không được để trống",
            },
        }
    });

    $('#btnSubmitCommentForm').click(function () {
        $('#commentForm').submit()
    })

    $("#commentForm").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        submitHandler: function (form) {

            localStorage.setItem('comment_info', JSON.stringify({
                gender: $('input[name=comment_gender]:checked').val(),
                name: $('input[name=comment_name]').val(),
                email: $('input[name=comment_email]').val(),
                phone: $('input[name=comment_phone]').val(),
            }));

            $.ajax({
                type: "POST",
                url: '/comments',
                data: {
                    "_token": "{{ csrf_token() }}",
                    customer_gender: $('input[name=comment_gender]:checked').val(),
                    customer_name: $('input[name=comment_name]').val(),
                    customer_email: $('input[name=comment_email]').val(),
                    customer_phone: $('input[name=comment_phone]').val(),
                    content: $('textarea[name=comment_content]').val(),
                    type: "{{ $type }}",
                    url: "{{ $url }}",
                    post_id: "{{ $post_id }}",
                },
                success: function (res) {

                    $('#commentModal').modal('hide');

                    $('textarea[name=comment_content]').val('');

                    Swal.fire({
                        title: 'Cảm ơn bạn đã gửi bình luận, chúng tôi sẽ xét duyệt và hiển thị ngay sau đó!',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'Xong'
                    })
                },
                error: function (err) {
                    $('#commentModal').modal('hide');

                    Swal.fire({
                        title: 'Gửi bình luận thất bại',
                        text: 'Vui lòng thử lại sau',
                        icon: 'error',
                        confirmButtonText: 'Thoát'
                    })
                }
            });
        },
        rules: {
            "comment_name": {
                required: true,
            },
            "comment_email": {
                required: true,
                email: true,
            },
            "comment_phone": {
                required: true,
                regex: PHONE_REGEX,
            },
        },
        messages: {
            "comment_name": {
                required: "Họ và tên không được để trống",
            },
            "comment_email": {
                email: "Email không đúng định dạng",
            },
            "comment_phone": {
                required: "Số điện thoại không được để trống",
                regex: 'Số điện thoại không đúng định dạng'
            },
        }
    });

    $('#btnSubmitReplyComment').click(function () {
        $('#replyCommentForm').submit();
    })

    @if(!auth()->check())

    $("#replyCommentForm").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        submitHandler: function (form) {

            localStorage.setItem('comment_info', JSON.stringify({
                gender: $('input[name=reply_comment_gender]:checked').val(),
                name: $('input[name=reply_comment_name]').val(),
                email: $('input[name=reply_comment_email]').val(),
                phone: $('input[name=reply_comment_phone]').val(),
            }));

            $.ajax({
                type: "POST",
                url: `/comments/${replyCommentId}/reply`,
                data: {
                    "_token": "{{ csrf_token() }}",
                    customer_gender: $('input[name=reply_comment_gender]:checked').val(),
                    customer_name: $('input[name=reply_comment_name]').val(),
                    customer_email: $('input[name=reply_comment_email]').val(),
                    customer_phone: $('input[name=reply_comment_phone]').val(),
                    created_at: $('input[name=reply_created_at]').val(),
                    content: $('textarea[name=reply_comment_content]').val(),
                    type: "{{ $type }}",
                    url: "{{ $url }}",
                    post_id: "{{ $post_id }}",
                    reply_to: replyTo
                },
                success: function (res) {

                    $('#replyCommentModal').modal('hide');

                    fetchCommentData();

                    Swal.fire({
                        title: 'Cảm ơn bạn đã phản hồi, chúng tôi sẽ xét duyệt và hiển thị ngay sau đó!',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'Xong'
                    })
                },
                error: function (err) {
                    $('#replyCommentModal').modal('hide');

                    Swal.fire({
                        title: 'Gửi phản hồi thất bại',
                        text: 'Vui lòng thử lại sau',
                        icon: 'error',
                        confirmButtonText: 'Thoát'
                    })
                }
            });
        },
        rules: {
            "reply_comment_name": {
                required: true,
            },
            "reply_comment_email": {
                required: true,
                email: true,
            },
            "reply_comment_phone": {
                required: true,
                regex: PHONE_REGEX,
            },
            "reply_comment_content": {
                required: true,
            }
        },
        messages: {
            "reply_comment_content": {
                required: "Nội dung không được để trống",
            },
            "reply_comment_name": {
                required: "Họ và tên không được để trống",
            },
            "reply_comment_email": {
                email: "Email không đúng định dạng",
            },
            "reply_comment_phone": {
                required: "Số điện thoại không được để trống",
                regex: 'Số điện thoại không đúng định dạng'
            },
        }
    });

    @else

    $("#replyCommentForm").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        submitHandler: function (form) {

            $.ajax({
                type: "POST",
                url: `/comments/${replyCommentId}/reply`,
                data: {
                    "_token": "{{ csrf_token() }}",
                    content: $('textarea[name=reply_comment_content]').val(),
                    type: "{{ $type }}",
                    url: "{{ $url }}",
                    post_id: "{{ $post_id }}",
                    reply_to: replyTo
                },
                success: function (res) {

                    $('#replyCommentModal').modal('hide');

                    fetchCommentData();

                    Swal.fire({
                        title: 'Cảm ơn bạn đã phản hồi, chúng tôi sẽ xét duyệt và hiển thị ngay sau đó!',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'Xong'
                    })
                },
                error: function (err) {
                    Swal.fire({
                        title: 'Gửi phản hồi thất bại',
                        text: 'Vui lòng thử lại sau',
                        icon: 'error',
                        confirmButtonText: 'Thoát'
                    })
                }
            });

        },
        rules: {
            "reply_comment_content": {
                required: true,
            }
        },
        messages: {
            "reply_comment_content": {
                required: "Nội dung không được để trống",
            },
        }
    });

    @endif


</script>
