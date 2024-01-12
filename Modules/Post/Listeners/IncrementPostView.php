<?php

namespace Modules\Post\Listeners;

use Modules\Post\Events\PostViewed;

class IncrementPostView
{
    /**
     * Handle the event.
     *
     * @param \Modules\Product\Events\ProductViewed $event
     * @return void
     */
    public function handle(PostViewed $event)
    {
        $event->post->increment('viewed');
    }
}
