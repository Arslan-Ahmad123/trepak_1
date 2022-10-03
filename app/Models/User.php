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
        'education',
        'university',
        'degreedate',
        'specialization',
        'services',
        'aboutme',
        'experience',
        'pricerange',
        'company',
        'emailstatus',
        'emailcode',
        'latitude',
        'longitude',
        'status',
        'adminengr',
        'address',
        'subcity',
        'city',
        'state',
        'country',
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
 
    
}
