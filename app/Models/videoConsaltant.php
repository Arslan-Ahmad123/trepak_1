<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class videoConsaltant extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'engr_id',
        'client_phone',
        'client_date',
        'client_time',
        'engr_reply',
        'client_reply',
        'orderstatus',
    ];
    public function getupdatedAtAttribute($res){
        // return $res->diffForHumans();
        return Carbon::parse($res)->timezone('Asia/Karachi')->format('g:i A');
    }
}
