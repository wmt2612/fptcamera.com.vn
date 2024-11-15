<?php

namespace Modules\Comment\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Comment\Entities\Comment;

class SendNewCommentEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Thông báo: {$this->comment->customer_name} vừa thêm một bình luận mới";

        return $this
            ->subject($subject)
            ->view('comment::emails.new-comment')
            ->with([
                'comment' => $this->comment
            ]);
    }
}
