<?php

namespace App\Listeners;

use App\Notifications\AttacheeDismissed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAttacheeDismissalNotice implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $event->attachee->applicant->user->notify(new AttacheeDismissed($event->attachee, $event->message, $event->reason));
    }
}