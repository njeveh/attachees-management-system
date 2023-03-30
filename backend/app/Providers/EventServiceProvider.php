<?php

namespace App\Providers;

use App\Events\ApplicationReplied;
use App\Events\AttacheeDismissed;
use App\Listeners\SendApplicationResponseNotification;
use App\Listeners\SendAttacheeDismissalNotice;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
        ApplicationReplied::class => [
            SendApplicationResponseNotification::class,
        ],
        AttacheeDismissed::class => [
            SendAttacheeDismissalNotice::class,
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}