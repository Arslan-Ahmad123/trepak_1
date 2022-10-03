<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'groupname',
        'groupmember',
    ];
    public function groupchat(){
        return $this->hasMany(groupChat::class,'groupid');
    }
}

