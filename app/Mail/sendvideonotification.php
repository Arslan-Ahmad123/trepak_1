<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendvideonotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $client_i;
    public $engr_i;
    public $order_i;
    public function __construct($clientinfo,$engrinfo,$orderinfo)
    {
        Log::info('yes mail run');
        $this->client_i = $clientinfo;
        $this->engr_i = $engrinfo;
        $this->order_i = $orderinfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info('handle mail fn');
        return $this->markdown('emails.sendVideoMail',['clientinfo'=> $this->client_i,'engrinfo'=> $this->engr_i,'orderinfo'=>$this->order_i]);
    }
}
