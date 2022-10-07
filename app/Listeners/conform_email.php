<?php

namespace App\Listeners;

use App\Events\conformemail;

use App\Mail\conformEmail as Email;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class conform_email
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
     * @param  \App\Events\conformemail  $event
     * @return void
     */
    public function handle(conformemail $event)
    {  
       
      
          $user =$event->userdata;
          Mail::to( $event->userdata['email'])->send(
            new Email($user)
        );
    }
}
