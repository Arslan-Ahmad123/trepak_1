<?php

namespace App\Listeners;

use App\Models\User;
use App\Mail\conformEmail as Email;

use App\Events\conformemail;
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
         
          \Mail::to( $event->userdata['email'])->send(
            new Email($user)
        );
    }
}
