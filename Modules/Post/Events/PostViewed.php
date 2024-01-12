<?php

namespace Modules\Post\Events;

use Illuminate\Queue\SerializesModels;

class PostViewed
{
    use SerializesModels;

    /**
     * The product entity.
     *
     * @var \Modules\Product\Entities\Product
     */
    public $post;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
    }
}
