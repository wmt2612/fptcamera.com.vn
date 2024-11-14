<?php

namespace Modules\Comment\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Comment\Entities\Comment;

class SendReplyCommentNoticeMail extends Mailable
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
        $subject = "[FPT Telecom] {$this->comment->customer_name} vừa trả lời một bình luận của bạn";
        return $this
            ->subject($subject)
            ->from('info@webmaster.com.vn', 'FPT Telecom')
            ->view('comment::mails.send_reply_comment_notice')
            ->with([
                'comment' => $this->comment
            ]);
    }
}
