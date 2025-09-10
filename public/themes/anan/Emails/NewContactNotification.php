<?php

namespace Themes\anan\Emails;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;

class NewContactNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Thông báo có khách hàng đăng ký thông tin #' . $this->data['contact_id'])
            ->view('v2.emails.info-register')
            ->with('data', $this->data);
    }
}