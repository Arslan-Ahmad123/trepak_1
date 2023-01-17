<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngrReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'client_id',
        'order_id',
        'review_id',
    ];
}
