<?php

namespace Themes\anan\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Mail;
use Modules\Contact\Entities\Contacts;
use Themes\anan\Emails\NewContactNotification;
use Themes\anan\Http\Requests\InformationRegisterRequest;

class InformationRegisterController
{
    public function create()
    {
        SEOMeta::setTitle('Đăng ký thông tin');

        return view('v2.register.info');
    }

    public function thankYou()
    {
        SEOMeta::setTitle('Cảm ơn quý khách');

        return view('v2.register.thank-you');
    }

    public function store(InformationRegisterRequest $request)
    {
        // Gộp service + note thành content
        $content = '';
        if ($request->filled('service')) {
            $content .= "Dịch vụ quan tâm: " . $request->service . "\n";
        }
        if ($request->filled('note')) {
            $content .= "Ghi chú: " . $request->note;
        }

        // Lưu vào database
        $contact = Contacts::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'content' => $content,
        ]);

        // Truyền dữ liệu request + id vừa tạo qua email
        $data = $request->only(['name', 'email', 'phone', 'service', 'note']);
        $data['contact_id'] = $contact->id;

        $emails = setting('hotline_recipient_emails'); // ví dụ: "admin@example.com, support@example.com"
        $recipients = array_map('trim', explode(',', $emails));

        if (count($recipients) > 0) {
            Mail::to($recipients)->queue(new NewContactNotification($data));
        }

        return redirect()->route('register.info.thank-you');
    }
}