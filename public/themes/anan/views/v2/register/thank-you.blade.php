@extends('v2.layout.mix_layout')

@section('content')
    <section class="thank-you py-5">
        <div class="container">
            <div class="thank-you-box text-center mx-auto">
                <div class="card shadow-sm p-4">
                    <div class="card-body">
                        <div class="mb-3 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="var(--xanhnuocbien)" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.97 11.03a.75.75 0 0 0 1.07.02l3.992-3.99a.75.75 0 1 0-1.06-1.06L7.5 9.44 5.53 7.47a.75.75 0 0 0-1.06 1.06l2.5 2.5z"/>
                            </svg>
                        </div>

                        <h2 class="fw-bold mb-3" style="color: var(--xanhnuocbien);">Đăng ký thành công!</h2>
                        <p class="text-muted mb-4">
                            Cảm ơn bạn đã để lại thông tin. <br>Chúng tôi sẽ liên hệ trong thời gian sớm nhất.
                        </p>
                        <a href="{{ url('/') }}" class="btn btn-primary" style="background-color: var(--xanhnuocbien); border-color: var(--xanhnuocbien);">
                            Quay về trang chủ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
