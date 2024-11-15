@extends('admin::layout')

@push('styles')
    <link type="text/css" href="{{ v(Theme::url('assets/v2/css/popup-lightbox.min.css')) }}" rel="stylesheet"/>
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

        .review-photos {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .review-photo-item {
            width: 80px;
            height: 80px;
        }

        .review-photo-item img{
            width: 100%;
        }
    </style>
@endpush

@section('content')
    <h2>Danh sách đánh giá</h2>
    <div class="box box-primary p-2" style="margin-top: 30px">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Số sao</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Duyệt</th>
                <th scope="col">Thời gian</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($ratings as $rating)
                <tr>
                    <th scope="row">{{ $rating->id }}</th>
                    <td>
                        @if($rating->type == \Modules\Rating\Entities\Rating::TYPE_URL)
                            <a href="{{ $rating->url }}" target="_blank">{{ $rating->customer_name }}</a>
                        @elseif($rating->type == \Modules\Rating\Entities\Rating::TYPE_POST_ID)
                            <a href="#" target="_blank">{{ $rating->customer_name }}</a>
                        @else
                            <a href="{{ route('product.single', ['slug' => $rating->product->slug]) . '#root-review'  }}" target="_blank">
                                @php $photos = count($rating->photos); @endphp
                                {{ $rating->customer_name }} @if($photos > 0) <span>({{ $photos }} ảnh)</span> @endif
                            </a>
                        @endif
                    </td>
                    <td>{{ $rating->customer_phone }}</td>
                    <td>
                        @if($rating->reply_id == 0)
                            @include('rating::partials.rating-star', ['rating' => $rating->rating])
                        @else
                            <div class="badge badge-reply">Reply</div>
                        @endif
                    </td>
                    <td id="ratingStatus{{$rating->id}}">
                        @if($rating->status == 1)
                            <div class="badge badge-success">Đã duyệt</div>
                        @elseif($rating->status == 2)
                            <div class="badge badge-danger">Không được duyệt</div>
                        @else
                            <div class="badge badge-primary">Chờ duyệt</div>
                        @endif
                    </td>
                    <td>
                        <label class="toggle">
                            <input class="toggle-checkbox" data-rating_id="{{ $rating->id }}" type="checkbox" @if($rating->status == 1) checked @endif >
                            <div class="toggle-switch"></div>
                        </label>
                    </td>
                    <td>{{ $rating->created_at }}</td>
                    <td>
                            <button class="btn btn-sm btn-primary btnEditReview"
                                    data-rating_id="{{ $rating->id }}"
                                    data-rating="{{ json_encode($rating) }}"
                            >
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                            <a href="#" class="btn btn-sm btn-danger btnDeleteReview"
                               data-rating_id="{{ $rating->id }}"
                            >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                    </td>
                </tr>
            @endforeach
            @if(count($ratings) == 0)
                <tr>
                    <td colspan="7" style="text-align: center">Không tồn tại bản ghi nào!</td>
                </tr>
            @endif
            </tbody>
        </table>
        {{ $ratings->links() }}
    </div>
    @include('rating::partials.edit-review-modal')
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{ v(Theme::url('assets/v2/js/jquery.popup.lightbox.min.js')) }}"></script>
    <script>
        let editRatingId = 0;
        let editRating = {};

        $(document).ready(function () {
            $('#edit-select-star li').hover(function () {
                const label = $(this).data('label');
                editRating.rating = $(this).data('rating');
                $('#star-desc').text(label);

                for (let i = editRating.rating + 1; i <= 5; i++) {
                    $(`#edit-select-star li:nth-child(${i}) path`).css('fill', '#8b8888');
                }

                for (let i = editRating.rating; i >= 1; i--) {
                    $(`#edit-select-star li:nth-child(${i}) path`).css('fill', 'rgb(241, 196, 15)');
                }

            });
        })
    </script>
    <script>
        $(document).ready(function () {
            $('.toggle-checkbox').change(function (e) {
                const ratingId = $(this).data('rating_id');
                $.ajax({
                    url: `/admin/ratings/${ratingId}/status`,
                    type: 'PUT',
                    success: function (res) {
                        if(res.status == 1) {
                            $(`#ratingStatus${ratingId}`).html(`
                             <div class="badge badge-danger">Đã duyệt</div>
                            `)
                        }else {
                            $(`#ratingStatus${ratingId}`).html(`
                             <div class="badge badge-danger">Không được duyệt</div>
                            `)
                        }

                    },
                    error: function (err) {
                    }
                })

            });

            $('.btnDeleteReview').click(function(e) {
                e.preventDefault();
                const review_id = $(this).data('rating_id');
                const result = confirm('Are you sure to delete selected review ?');
                if(result) {
                    window.location.replace(`/admin/ratings/${review_id}/delete`)
                }
            })

            $('.btnEditReview').click(function () {
                const rating = $(this).data('rating');
                const photos = rating.photos;

                editRating = rating;
                editRatingId = rating.id;

                $('input[name=customer_name]').val(rating.customer_name);
                $('input[name=customer_email]').val(rating.customer_email ?? rating.user?.email);
                $('input[name=customer_phone]').val(rating.customer_phone);
                $('textarea[name=review]').val(rating.review);

                if (photos.length > 0) {
                    $('.review-text-box .review-photos').remove();

                    $('.review-text-box').append(`
                         <div class="d-flex gap-10 review-photos">
                                ${photos.map((photo) => (
                                    `<div class="review-photo-item">
                                        <img alt="${rating.review}" src="${photo.path}"/>
                                    </div>`
                                ))}
                         </div>
                    `);

                    // $(".review-photos").popupLightbox();
                }

                if(rating.customer_gender === 'male') {
                    $('#genderMale').prop('checked', true);
                }else {
                    $('#genderFemale').prop('checked', true);
                }

                for (let i = rating.rating + 1; i <= 5; i++) {
                    $(`#edit-select-star li:nth-child(${i}) path`).css('fill', '#8b8888');
                }
                for (let i = rating.rating; i >= 1; i--) {
                    $(`#edit-select-star li:nth-child(${i}) path`).css('fill', 'rgb(241, 196, 15)');
                }


                $('#star-desc').html(`${$(`#edit-select-star li:nth-child(${rating.rating})`).data('label')}`);

                $('#editReviewModal').modal('show');
            });

            $('#btnSubmitEditReview').click(function () {
                $('#editReviewForm').submit();
            })

            $.validator.addMethod(
                "regex",
                function (value, element, regexp) {
                    const re = new RegExp(regexp);
                    return this.optional(element) || re.test(value);
                },
                "Please check your input."
            );

            $("#editReviewForm").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                submitHandler: function (form) {

                    $.ajax({
                        type: "PUT",
                        url:  `/admin/ratings/${editRatingId}`,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            rating: editRating.rating,
                            customer_gender: $('input[name=gender]:checked').val(),
                            customer_name: $('input[name=customer_name]').val(),
                            customer_email: $('input[name=customer_email]').val(),
                            customer_phone: $('input[name=customer_phone]').val(),
                            review: $('textarea[name=review]').val(),
                            type: editRating.type
                        },
                        success: function (res) {
                            $('#editReviewModal').modal('hide');
                            window.location.reload();
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
                        required: false,
                        regex: /(84|0[3|5|7|8|9])+([0-9]{8})\b/g
                    },
                    "customer_email": {
                        required: false,
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


        })
    </script>
@endpush
