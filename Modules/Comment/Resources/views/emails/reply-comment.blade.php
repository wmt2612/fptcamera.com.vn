<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply to Your Comment</title>
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
        .comment, .reply {
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
    <h2>Thông báo: Bình luận của bạn đã được phản hồi</h2>
    <p>Xin chào {{ $comment->customer_name }},</p>
    <p>Chúng tôi trân trọng thông báo rằng bình luận của bạn trên <strong>FPTC</strong> đã nhận được phản hồi. Dưới đây là nội dung chi tiết:</p>

    <h3>Bình luận của bạn:</h3>
    <div class="comment">
        {{ $comment->content }}
    </div>

    <h3>Phản hồi từ {{ $reply->customer_name }}:</h3>
    <div class="reply">
        {{ $reply->content }}
    </div>

    <p>Để xem chi tiết hoặc trả lời thêm, vui lòng nhấp vào liên kết sau:</p>
    <p><a href="{{ $comment->link() }}">Xem chi tiết bình luận và phản hồi</a></p>

    <p>Trân trọng,<br>Đội ngũ Hỗ trợ <strong>FPTC</strong></p>
</div>
</body>
</html>
