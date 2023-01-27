<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\NewUserEvent;
use App\Listeners\RegisterEventHandler;
use Spatie\WebhookServer\Events\WebhookCallSucceededEvent;
use Spatie\WebhookServer\Events\FinalWebhookCallFailedEvent;
use App\Listeners\WebhookCallSucceededEventHandler;
use App\Listeners\FinalWebhookCallSucceededEventHandler;
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewUserEvent::class => [
            RegisterEventHandler::class,
        ],
        WebhookCallSucceededEvent::class => [
            WebhookCallSucceededEventHandler::class,
        ],
        FinalWebhookCallFailedEvent::class => [
            FinalWebhookCallSucceededEventHandler::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
