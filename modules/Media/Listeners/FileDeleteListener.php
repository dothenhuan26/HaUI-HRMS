<?php

namespace Modules\Media\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use UniSharp\LaravelFilemanager\Events\ImageWasDeleted;

class FileDeleteListener
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
    public function handle(ImageWasDeleted $event): void
    {
        //
        Log::info($event->path());

    }
}
