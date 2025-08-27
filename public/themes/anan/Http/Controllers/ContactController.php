<?php

namespace Themes\anan\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Modules\Contact\Entities\Contacts;
use Themes\anan\Emails\HotlineRequestMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate số điện thoại
        $validated = $request->validate([
            'phone' => ['required', 'regex:/^(0[0-9]{9})$/']
        ]);

        // Lưu vào DB
        $contact = Contacts::create([
            'phone' => $validated['phone'],
            'name' => 'Khách ẩn danh',
            'content' => 'Khách đăng ký tư vấn qua popup hotline'
        ]);

        $emails = setting('hotline_recipient_emails'); // ví dụ: "admin@example.com, support@example.com"
        $recipients = array_map('trim', explode(',', $emails));

        // Gửi email thông báo
        if (count($recipients) > 0) {
            Mail::to($recipients)
                ->queue(new HotlineRequestMail($contact));
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Chúng tôi đã nhận được yêu cầu. Nhân viên sẽ gọi lại sớm nhất!',
        ]);
    }
}