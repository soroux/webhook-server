<?php

namespace App\Listeners;

use Spatie\WebhookServer\Events\FinalWebhookCallFailedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FinalWebhookCallSucceededEventHandler
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Spatie\WebhookServer\Events\FinalWebhookCallFailedEvent  $event
     * @return void
     */
    public function handle(FinalWebhookCallFailedEvent $event)
    {
        //
        logger(json_encode($event));
    }
}
