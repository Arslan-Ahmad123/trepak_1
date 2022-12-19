<?php

namespace App\Listeners;

use App\Models\User;
use App\Mail\conformationMail;
use App\Events\conformationEngineer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class conformationEngineerNotification
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
     * @param  \App\Events\conformationEngineer  $event
     * @return void
     */
    public function handle(conformationEngineer $event)
    {
         $user = User::find($event->userid)->toArray();
        //  Mail::send('mail.conformation-mail', $user, function($message) use ($user) {
        //     $message->to($user['email']);
        //     $message->subject('Event Testing');
        // });
         Mail::to( $user['email'])->send(
            new conformationMail()
        );
        // dd($user);
       
    }
}
