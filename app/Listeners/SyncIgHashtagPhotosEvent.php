<?php

namespace App\Listeners;

use App\Events\EventSaving;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SyncIgHashtagPhotosEvent
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
     * @param  App\Events\EventSaving  $event
     * @return bool
     */
    public function handle(EventSaving $event)
    {
        $model = $event->event;

        // If this model created for the first time, we fine.
        if (!$model->exists) {
            return true;
        }

        // If this model is about to update and there is no modification in ig_hashtag field, We fine.
        if ($model->getOriginal('ig_hashtag') == $model->getAttribute('ig_hashtag')) {
            return true;
        }

        // instead, we will update status to pending,
        // indicates that we need to fetch this new hashtag value
        // then delete the photos that associates with old hashtag
        $model->ig_hashtag_status = 'pending';
        $model->photos()->delete();

        return true;
    }
}
