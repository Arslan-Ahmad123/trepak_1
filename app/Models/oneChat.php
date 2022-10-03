<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class oneChat extends Model
{
    use HasFactory;
    protected $fillable = [
        'clientid',
        'engrid',
        'senderid',
        'reciverid',
        'message',
    ];
    
}
