<?php

namespace Modules\Rating\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Rating\Entities\Rating;

class SendReplyReviewMail extends Mailable
{
    use Queueable, SerializesModels;

    private $rating;
    private $reply;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Rating $rating, Rating $reply)
    {
        $this->rating = $rating;
        $this->reply = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Thông báo: Đánh giá của bạn trên FPTC đã được {$this->reply->customer_name} phản hồi";

        return $this
            ->subject($subject)
            ->view('rating::emails.reply-review', [
                'rating' => $this->rating,
                'reply' => $this->reply
            ]);
    }
}
