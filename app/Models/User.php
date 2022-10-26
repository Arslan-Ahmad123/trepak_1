<?php

namespace App\Models;


use App\Models\Comment;
use App\Models\oneChat;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pic',
        'fname',
        'lname',
        'email',
        'password',
        'role',
        'mobile',
        'engrcategoryid',
        'cv',
        'workplacetype',
        'jobtype',
        'about',
        'emailstatus',
        'emailcode',
        'docsstatus',
        'latitude',
        'longitude',
        'status',
        'adminengr',
        'address',
        'subcity',
        'city',
        'state',
        'country',
        'short_country',
        'signupoption',
        'salary',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function comment(){
        return $this->hasMany(Comment::class,'engrid');
    }
    public function category(){
        return $this->belongsTo(engCategory::class,'engrcategoryid');
    }
 
    
}
