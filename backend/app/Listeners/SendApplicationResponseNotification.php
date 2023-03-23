<?php

namespace App\Listeners;

use App\Notifications\ApplicationResponse;
use App\Utilities\Utilities;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendApplicationResponseNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {


    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $event->application->attachee->user->notify(new ApplicationResponse($event->application, $event->message, $event->revocation_reasons));
    }
}