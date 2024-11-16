<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Rating Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .rating {
            font-size: 18px;
            color: #555;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="email-container">
    <h2>Thông báo đánh giá từ khách hàng</h2>
    <p>Chúng tôi đã nhận được một đánh giá từ khách hàng trên website <strong>FPTC</strong>:</p>
    <ul>
        <li><strong>Tên khách hàng:</strong> {{ $rating->customer_name }}</li>
        <li><strong>Email:</strong> {{ $rating->customer_email }}</li>
        <li><strong>Số điện thoại:</strong> {{ $rating->customer_phone }}</li>
        <li class="rating"><strong>Đánh giá:</strong> {{ $rating->rating }}/5</li>
    </ul>
    <p>Để xem chi tiết, vui lòng nhấp vào liên kết sau:</p>
    <p><a href="{{ $rating->link() }}">Xem chi tiết đánh giá</a></p>
    <p>Trân trọng,<br>Đội ngũ Hỗ trợ <strong>FPTC</strong></p>
</div>
</body>
</html>
