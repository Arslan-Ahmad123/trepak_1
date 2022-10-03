<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'clientid',
        'engrid',
        'service',
        'response',
        'comment',
        'replies',
        'engrstatus'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
