<?php

namespace App\Models;
use Carbon\Carbon;

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

    public function getcreatedAtAttribute($res){
        // return $res->diffForHumans();
        return Carbon::parse($res)->format('M-d-Y g:i A');
    }
    
}
