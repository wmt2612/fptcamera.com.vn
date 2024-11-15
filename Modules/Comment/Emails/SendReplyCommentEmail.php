<?php

namespace Modules\Comment\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Comment\Entities\Comment;

class SendReplyCommentEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $comment;
    protected $reply;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment, Comment $reply)
    {
        $this->comment = $comment;
        $this->reply = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Thông báo: {$this->reply->customer_name} vừa trả lời một bình luận của bạn";
        return $this
            ->subject($subject)
            ->view('comment::emails.reply-comment')
            ->with([
                'comment' => $this->comment,
                'reply' => $this->reply
            ]);
    }
}
