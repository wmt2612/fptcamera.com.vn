<?php

namespace Themes\anan\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Contact\Entities\Contacts;

class HotlineRequestMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contacts $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("[FPTC] Yêu cầu tư vấn qua hotline #{$this->contact->id}")
            ->view('v2.emails.hotline')
            ->with([
                'contact' => $this->contact,
            ]);
    }
}
