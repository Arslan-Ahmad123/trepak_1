<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointmentInfo extends Model
{
    use HasFactory;
     protected $fillable = [
        'engrid',
        'clientid',
        'meetingdate',
        'bookingfee',
        'consultingfee',
        'tlprice',
        'paymentmethod',
        'engrstatus', 
        'clientstatus', 
    ];
}
