<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .info {
            margin: 6px 0;
            font-size: 14px;
            color: #444;
        }

        .highlight {
            color: #e63946;
            font-weight: bold;
        }

        a {
            color: #1d4ed8;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="title">📞 Yêu cầu tư vấn qua hotline</div>
    <div class="info">Tên khách hàng: <span class="highlight">{{ $contact->name }}</span></div>
    <div class="info">Số điện thoại: <span class="highlight">{{ $contact->phone }}</span></div>
    <div class="info">Nội dung: {{ $contact->content }}</div>
    <div class="info">Thời gian: {{ $contact->created_at->format('Y-m-d H:i') }}</div>
    <div class="info">Trang gửi yêu cầu:
        <a href="{{ config('app.url') }}">
            {{ config('app.url') }}
        </a>
    </div>
</div>
</body>
</html>
