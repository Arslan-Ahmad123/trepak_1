<?php

namespace App\Listeners;

use App\Events\sendVideoevent;
use App\Mail\sendvideonotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendVideolistener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        Log::info('listener is working');
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\sendVideoevent  $event
     * @return void
     */
    public function handle(sendVideoevent $event)
    {
        $user =$event->clientinfo['email'];
       
          Mail::to( $user)->send(
            new sendvideonotification($event->clientinfo,$event->engrinfo,$event->orderinfo)
        );
       
    }
}
