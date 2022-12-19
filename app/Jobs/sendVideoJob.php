<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\sendvideonotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class sendVideoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $clientinfo;
    public $engrinfo;
    public $orderinfo;
    public function __construct($client_info,$engineer_info,$order_info)
    {
        $this->clientinfo = $client_info;
        $this->engrinfo = $engineer_info;
        $this->orderinfo = $order_info;  
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       Log::info('yes ok iasaodakldkjaoisd oaijd oiasjd');
        Log::info($this->clientinfo['email']);
        Log::info($this->engrinfo->fname);
        Log::info($this->orderinfo['id']);
        $reciver_email = $this->clientinfo['email'];
        \Mail::to($reciver_email)->send(new \App\Mail\sendvideonotification($this->clientinfo,$this->engrinfo,$this->orderinfo));
        Log::info('yes  this is a laravel');
    }
}
