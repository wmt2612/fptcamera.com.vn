<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông báo đăng ký mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f9fc;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .email-header {
            background: var(--xanhnuocbien, #007bff);
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .email-header h2 {
            margin: 0;
            font-size: 20px;
        }
        .email-body {
            padding: 20px;
            color: #333333;
            line-height: 1.6;
        }
        .email-body p {
            margin: 8px 0;
        }
        .email-body strong {
            color: #000;
        }
        .email-footer {
            text-align: center;
            font-size: 13px;
            color: #888888;
            padding: 15px;
            border-top: 1px solid #eeeeee;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="email-header">
        <h2>Thông báo đăng ký mới</h2>
    </div>
    <div class="email-body">
        <p><strong>Contact ID:</strong> {{ $data['contact_id'] }}</p>
        <p><strong>Họ và tên:</strong> {{ $data['name'] }}</p>
        <p><strong>Số điện thoại:</strong> {{ $data['phone'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] ?? 'Không cung cấp' }}</p>
        <p><strong>Dịch vụ quan tâm:</strong> {{ $data['service'] ?? 'Không cung cấp' }}</p>
        <p><strong>Ghi chú:</strong> {{ $data['note'] ?? 'Không có' }}</p>
    </div>
    <div class="email-footer">
        <p>Đây là email tự động, vui lòng không trả lời.</p>
        <p>&copy; {{ date('Y') }} FPTC</p>
    </div>
</div>
</body>
</html>
