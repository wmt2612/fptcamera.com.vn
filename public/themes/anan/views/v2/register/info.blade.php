@extends('v2.layout.mix_layout')

@section('content')
    <section class="info-register py-5">
        <div class="container">
            <div class="info-register-box mx-auto">

                <!-- Banner thông báo -->
                <div class="info-register-banner text-center mb-4">
                    <h2 class="fw-bold">Đăng ký ngay để nhận ưu đãi và tư vấn miễn phí</h2>
                    <p class="text-muted">Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.</p>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4">Thông tin đăng ký</h3>

                        {{-- Thông báo thành công --}}
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Form --}}
                        <form action="{{ route('register.info.store') }}" method="POST" class="info-register-form row g-3" >
                            @csrf

                            <!-- Họ và tên -->
                            <div class="col-md-6">
                                <label for="name" class="form-label">Họ và tên <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name"
                                       placeholder="Nhập họ và tên của bạn"
                                       value="{{ old('name') }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Số điện thoại -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       id="phone" name="phone"
                                       placeholder="Ví dụ: 0912 345 678"
                                       pattern="^(0|\+84)(3[2-9]|5[689]|7[06-9]|8[1-9]|9\d)\d{7}$"
                                       value="{{ old('phone') }}" required>
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="email" class="form-label">Địa chỉ Email</label>
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email" name="email"
                                       placeholder="Nhập email (nếu có)"
                                       value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Địa chỉ -->
                            <div class="col-md-6">
                                <label for="address" class="form-label">Địa chỉ <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('address') is-invalid @enderror"
                                       id="address" name="address"
                                       placeholder="Nhập địa chỉ liên hệ"
                                       value="{{ old('address') }}" required>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Dịch vụ quan tâm -->
                            <div class="col-12">
                                <label for="service" class="form-label">Dịch vụ quan tâm <span class="text-danger">*</span></label>
                                <input type="text"
                                       class="form-control @error('service') is-invalid @enderror"
                                       id="service" name="service"
                                       placeholder="Ví dụ: Camera an ninh, Internet FPT, Giải pháp SmartHome..."
                                       value="{{ old('service') }}" required>
                                @error('service')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Ghi chú -->
                            <div class="col-12">
                                <label for="note" class="form-label">Ghi chú</label>
                                <textarea
                                        class="form-control @error('note') is-invalid @enderror"
                                        id="note" name="note" rows="3"
                                        placeholder="Ghi thêm yêu cầu khác (nếu có)">{{ old('note') }}</textarea>
                                @error('note')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nút đăng ký -->
                            <div class="col-12 text-center">
                                <button type="submit" class="btn info-register-btn">Đăng ký ngay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
