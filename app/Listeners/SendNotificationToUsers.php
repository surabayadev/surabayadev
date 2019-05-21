<?php

namespace App\Listeners;

use App\Events\EventPublished;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationToUsers
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
     * @param  App\Events\EventPublished  $event
     * @return void
     */
    public function handle(EventPublished $event)
    {
        // to access model
        // $event->event;
        Log::info(__CLASS__ . ' Iki send email notification soale event terpublish');
    }
}
