<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupChat extends Model
{
    use HasFactory;
    protected $fillable = [
        'senderid',
        'groupid',
        'message',
    ];
    public function groupinfo(){
        return $this->belongsTo(groupInfo::class);
    }
}
