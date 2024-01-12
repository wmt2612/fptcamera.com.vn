<?php

namespace Themes\Anan\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
    */

    public function build()
    {
        $this->order->load('products');
        return $this->from('info@webmaster.com.vn')->subject(trans('anan::mail.thank_you'))->view('public.emails.new_order')
                    ->with(
                        'order', $this->order,
                        );
    }
}
