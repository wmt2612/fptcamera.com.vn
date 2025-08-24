@extends('public.layout')

@section('title', '404 - Trang không tồn tại | FPTC')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">

                <!-- SVG Icon -->
                <div class="mb-4 text-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="140" height="140" fill="currentColor"
                         class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                        <path d="M7.938 2.016a.13.13 0 0 1 .124 0l6.857 11.856c.03.052.03.118
                             0 .17a.13.13 0 0 1-.124.06H1.205a.13.13 0 0 1-.124-.06.146.146
                             0 0 1 0-.17L7.938 2.016zM8 4.58c-.265 0-.482.218-.482.486l-.35
                             4.646c0 .268.217.486.482.486s.482-.218.482-.486L8.482 5.07c0-.268
                             -.217-.486-.482-.486zm.002 6.813a.688.688 0 1 0 0 1.375.688.688
                             0 0 0 0-1.375z"/>
                    </svg>
                </div>

                <!-- Heading -->
                <h1 class="display-4 fw-bold text-danger">404</h1>
                <h2 class="mb-3">Oops! Trang bạn tìm không tồn tại</h2>
                <p class="text-muted">
                    Có thể URL bạn nhập sai, hoặc trang đã bị xóa khỏi hệ thống.
                    Hãy quay lại trang chủ hoặc tiếp tục khám phá các sản phẩm của FPTC.
                </p>

                <!-- Action buttons -->
                <div class="d-flex justify-content-center gap-3 mt-4" style="gap: 15px">
                    <a href="{{ url('/') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-house-door"></i> Về trang chủ
                    </a>
                    <a href="{{ url('/thiet-bi-camera-an-ninh') }}" class="btn btn-outline-secondary btn-lg">
                        <i class="bi bi-camera-video"></i> Xem sản phẩm
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
