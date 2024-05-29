<?php

namespace Modules\Media\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use UniSharp\LaravelFilemanager\Events\ImageWasUploaded;

class FileUploadListener
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
    public function handle(ImageWasUploaded $event): void
    {
        //
        $path = $event->path();
        Log::info($path);
    }


}
