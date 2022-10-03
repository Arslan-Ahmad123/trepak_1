<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientInfo extends Model
{
    use HasFactory;
     protected $fillable = [
        'pic',
        'mobile',
        'nationalidentity',
        'address',
        'city',
        'province',
        'country', 
    ];
}
