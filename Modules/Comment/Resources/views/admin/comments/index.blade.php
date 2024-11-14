@extends('admin::layout')

@push('styles')
    <style>
        .table {
            padding: 20px;
        }

        .review-star {
            list-style: none;
            display: flex;
            gap: 5px;
        }

        .review-star-item {

        }

        .toggle {
            cursor: pointer;
            display: inline-block;
        }

        .toggle-switch {
            display: inline-block;
            background: #ccc;
            border-radius: 16px;
            width: 58px;
            height: 32px;
            position: relative;
            vertical-align: middle;
            transition: background 0.25s;
        }

        .toggle-switch:before, .toggle-switch:after {
            content: "";
        }

        .toggle-switch:before {
            display: block;
            background: linear-gradient(to bottom, #fff 0%, #eee 100%);
            border-radius: 50%;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.25);
            width: 24px;
            height: 24px;
            position: absolute;
            top: 4px;
            left: 4px;
            transition: left 0.25s;
        }

        .toggle:hover .toggle-switch:before {
            background: linear-gradient(to bottom, #fff 0%, #fff 100%);
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.5);
        }

        .toggle-checkbox:checked + .toggle-switch {
            background: #56c080;
        }

        .toggle-checkbox:checked + .toggle-switch:before {
            left: 30px;
        }

        .toggle-checkbox {
            position: absolute;
            visibility: hidden;
        }

        .toggle-label {
            margin-left: 5px;
            position: relative;
            top: 2px;
        }

        .badge-success {
            background-color: #069851;
        }

        .badge-danger {
            background-color: red;
        }

        .badge-primary {
            background-color: #087bac;
        }

        .badge-reply {
            background-color: #8b06b0;
        }

        label.error {
            color: red;
        }
    </style>
@endpush

@section('content')
    <h2>Danh sách bình luận</h2>
    <div class="box box-primary p-2" style="margin-top: 30px">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Duyệt</th>
                <th scope="col">Thời gian</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <th scope="row">{{ $comment->id }}</th>
                    <td>
                        @if($comment->type == \Modules\Comment\Entities\Comment::TYPE_URL)
                            <a href="{{ $comment->url }}" target="_blank">{{ $comment->customer_name }}</a>
                        @elseif($comment->type == \Modules\Comment\Entities\Comment::TYPE_POST_ID)
                            <a href="#" target="_blank">{{ $comment->customer_name }}</a>
                        @else
                            <a href="{{ route('product.single', ['slug' => $comment->product->slug]) . '#root-review'  }}" target="_blank">{{ $comment->customer_name }}</a>
                        @endif
                    </td>
                    <td>{{ $comment->customer_phone }}</td>
                    <td id="commentStatus{{$comment->id}}">
                        @if($comment->status == 1)
                            <div class="badge badge-success">Đã duyệt</div>
                        @elseif($comment->status == 2)
                            <div class="badge badge-danger">Không được duyệt</div>
                        @else
                            <div class="badge badge-primary">Chờ duyệt</div>
                        @endif
                    </td>
                    <td>
                        <label class="toggle">
                            <input class="toggle-checkbox" data-comment_id="{{ $comment->id }}" type="checkbox" @if($comment->status == 1) checked @endif >
                            <div class="toggle-switch"></div>
                        </label>
                    </td>
                    <td>{{ $comment->created_at }}</td>
                    <td>
                        <div class="d-flex">
                            <button class="btn btn-sm btn-primary btnEditComment"
                                    data-comment_id="{{ $comment->id }}"
                                    data-comment="{{ json_encode($comment) }}"
                            >
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                            <a href="#" class="btn btn-sm btn-danger btnDeleteComment"
                               data-comment_id="{{ $comment->id }}"
                            >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $comments->links() }}
    </div>
    @include('comment::admin.comments.partials.edit-comment-modal')
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script>
        let editCommentId = 0;
        let editComment = {};

        $(document).ready(function () {

        })
    </script>
    <script>
        $(document).ready(function () {
            $('.toggle-checkbox').change(function (e) {
                const commentId = $(this).data('comment_id');
                $.ajax({
                    url: `/admin/comments/${commentId}/status`,
                    type: 'PUT',
                    success: function (res) {
                        if(res.status == 1) {
                            $(`#commentStatus${commentId}`).html(`
                             <div class="badge badge-danger">Đã duyệt</div>
                            `)
                        }else {
                            $(`#commentStatus${commentId}`).html(`
                             <div class="badge badge-danger">Không được duyệt</div>
                            `)
                        }

                    },
                    error: function (err) {
                    }
                })

            });

            $('.btnDeleteComment').click(function(e) {
                e.preventDefault();
                const commentId = $(this).data('comment_id');
                const result = confirm('Are you sure to delete selected comment ?');
                if(result) {
                    window.location.replace(`/admin/comments/${commentId}/delete`)
                }
            })

            $('.btnEditComment').click(function () {
                const comment = $(this).data('comment');

                console.log(comment)

                editComment = comment;
                editCommentId = comment.id;

                $('input[name=customer_name]').val(comment.customer_name);
                $('input[name=customer_email]').val(comment.customer_email ?? comment.user?.email);
                $('input[name=customer_phone]').val(comment.customer_phone);
                $('textarea[name=content]').val(comment.content);
                $('input[name=created_at]').val(comment.raw_created_at);

                if(comment.customer_gender === 'male') {
                    $('#genderMale').prop('checked', true);
                }else {
                    $('#genderFemale').prop('checked', true);
                }

                $('#editCommentModal').modal('show');
            });

            $('#btnSubmitEditComment').click(function () {
                $('#editCommentForm').submit();
            })

            $.validator.addMethod(
                "regex",
                function (value, element, regexp) {
                    const re = new RegExp(regexp);
                    return this.optional(element) || re.test(value);
                },
                "Please check your input."
            );

            $("#editCommentForm").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                submitHandler: function (form) {

                    $.ajax({
                        type: "PUT",
                        url:  `/admin/comments/${editCommentId}`,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            comment: editComment.comment,
                            customer_gender: $('input[name=gender]:checked').val(),
                            customer_name: $('input[name=customer_name]').val(),
                            customer_email: $('input[name=customer_email]').val(),
                            customer_phone: $('input[name=customer_phone]').val(),
                            content: $('textarea[name=content]').val(),
                            created_at: $('input[name=created_at]').val(),
                            type: editComment.type
                        },
                        success: function (res) {
                            $('#editCommentModal').modal('hide');
                            window.location.reload();
                        },
                        error: function (err) {
                            console.log(err)
                        }
                    });
                },
                rules: {
                    "content": {
                        required: true,
                    },
                    "customer_name": {
                        required: true,
                    },
                    "customer_phone": {
                        required: false,
                        regex: /(84|0[3|5|7|8|9])+([0-9]{8})\b/g
                    },
                    "customer_email": {
                        required: false,
                    },
                },
                messages: {
                    "content": {
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
                        email: 'Email không đúng định dạng'
                    },
                }
            });
        })
    </script>
@endpush
