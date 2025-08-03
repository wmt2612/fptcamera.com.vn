<?php

namespace Modules\Rating\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Rating\Entities\Rating;

class SendReviewMail extends Mailable
{
    use Queueable, SerializesModels;

    private $rating;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Rating $rating)
    {
        $this->rating = $rating;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Thông báo: Khách hàng {$this->rating->customer_name} vừa gửi đánh giá trên FPTC";

        return $this
            ->subject($subject)
            ->view('rating::emails.review', [
            'rating' => $this->rating
        ]);
    }
}
