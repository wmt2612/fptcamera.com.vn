<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Comment Notification</title>
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
        .comment {
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
    <h2>Thông báo: Bình luận mới từ khách hàng</h2>
    <p>Kính gửi Admin,</p>
    <p>Chúng tôi vừa nhận được một bình luận mới từ khách hàng trên website <strong>FPTC</strong>. Dưới đây là thông tin chi tiết:</p>

    <ul>
        <li><strong>Tên khách hàng:</strong> {{ $comment->customer_name }}</li>
        <li><strong>Email:</strong> {{ $comment->customer_email }}</li>
        <li><strong>Số điện thoại:</strong> {{ $comment->customer_phone }}</li>
    </ul>

    <h3>Nội dung bình luận:</h3>
    <div class="comment">
        {{ $comment->content }}
    </div>

    <p>Để xem chi tiết bình luận, vui lòng nhấp vào liên kết sau:</p>
    <p><a href="{{ $comment->link() }}">Xem chi tiết bình luận</a></p>

    <p>Trân trọng,<br>Đội ngũ Hỗ trợ <strong>FPTC</strong></p>
</div>
</body>
</html>
