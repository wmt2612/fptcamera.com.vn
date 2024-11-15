<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification of Reply to Your Review</title>
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
        .rating, .reply {
            font-size: 16px;
            color: #555;
            background: #f3f3f3;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="email-container">
    <h2>Thông báo: Đánh giá của bạn đã được phản hồi</h2>
    <p>Xin chào {{ $rating->customer_name }},</p>
    <p>Chúng tôi trân trọng thông báo rằng đánh giá của bạn trên <strong>FPT Camera</strong> đã nhận được phản hồi. Dưới đây là nội dung:</p>

    <h3>Đánh giá của bạn:</h3>
    <div class="rating">
        <p><strong>Đánh giá:</strong> {{ $rating->rating }}/5</p>
        <p><strong>Nội dung:</strong> "{{ $rating->review }}"</p>
    </div>

    <h3>Phản hồi từ đội ngũ FPT Camera:</h3>
    <div class="reply">
        <p>{{ $reply->review }}</p>
    </div>

    <p>Để xem chi tiết hoặc trả lời, vui lòng nhấp vào liên kết sau:</p>
    <p><a href="{{ $rating->link() }}">Xem chi tiết đánh giá và phản hồi</a></p>

    <p>Trân trọng,<br>Đội ngũ Hỗ trợ <strong>FPT Camera</strong></p>
</div>
</body>
</html>
